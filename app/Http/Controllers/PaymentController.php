<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;

class PaymentController extends Controller
{
    public function pay() {
        return view('payment.pay');
    }

    public function success() {
        return view('payment.success');
    }

    /**
     * Simplify Your Online Payments With Laravel Stripe Payment Gateway Integration
     * https://www.cloudways.com/blog/laravel-stripe-integration/
     */

    public function validation(Request $request) {
        $this->validate($request, [
            'card_number'=>'required',
            'expiration_month'=>'required',
            'expiration_year'=>'required',
            'cvc'=>'required',
        ]);

        //return to login verification

        $input = $request->all();
        $input = array_except($input,array('_token'));

        env('STRIPE_API_KEY');
        $stripe = Stripe::make();

        try {
            $token = $stripe->tokens()->create([
            'card' => [
            'number' => $request->card_number,
            'exp_month' => $request->expiration_month,
            'exp_year' => $request->expiration_year,
            'cvc' => $request->cvc,
            ],
            ]);

            if (!isset($token['id'])) {
                return redirect()->route('payment.pay');
            }

            $cards = $stripe->cards()->all(auth()->user()->stripe_id);
            foreach ($cards['data'] as $card) {
                dd($card['number']);
            }

            $charge = $stripe->charges()->create([
                'customer' => auth()->user()->stripe_id,
                'currency' => 'USD',
                'amount' => Cart::total(),
            ]);

            if($charge['status'] == 'succeeded') {
                Cart::destroy();
                return redirect()->route('payment.success');
            }
            else {
                return back()->withError('Payment not successful...')->withInput();
            }
        }

        catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
            return redirect()->route('payment.pay');
            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return back()->withError($e->getMessage())->withInput();
            return redirect()->route('payment.pay');
            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return back()->withError($e->getMessage())->withInput();
            return redirect()->route('payment.pay');
        }
    }
}
