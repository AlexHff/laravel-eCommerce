<?php

/**
 * Simplify Your Online Payments With Laravel Stripe Payment Gateway Integration
 * https://www.cloudways.com/blog/laravel-stripe-integration/
 */

namespace App\Http\Controllers;

use Cart;
use Hash;
use Auth;
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

    public function show() {
        return view('payment.show');
    }

    public function create() {
        return view('payment.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'card_number'=>'required',
            'expiration_month'=>'required',
            'expiration_year'=>'required',
            'cvc'=>'required',
        ]);

        env('STRIPE_API_KEY');
        $stripe = Stripe::make();

        $input = $request->all();
        $input = array_except($input,array('_token'));

        $user = auth()->user();

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

            if(isset($user->stripe_id)){
                $customer = $stripe->customers()->find($user->stripe_id);
            }
            else {
                $customer = $stripe->customers()->create([
                    'email' => $user->email,
                ]);
                $user->stripe_id = $customer['id'];
                $user->save();
            }

            if($customer['created'] != null) {
                $stripe->cards()->create($user->stripe_id, $token['id']);
                return redirect()->route('payment.show');
            }
            else {
                return back()->withError('Could not create customer.')->withInput();
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

    public function validation(Request $request) {
        $this->validate($request, [
            'email'=>'required|max:191|email',
            'password'=>'required',
        ]);

        if(($request->email == auth()->user()->email) && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            env('STRIPE_API_KEY');
            $stripe = Stripe::make();

            try {
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
                    return back()->withError('Payment not successful.')->withInput();
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
        else {
            return back()->withError('Incorrect email or password.')->withInput();
        }
    }

        public function delete(Request $request) {
            env('STRIPE_API_KEY');
            $stripe = Stripe::make();
            $user = auth()->user();

            $card = $stripe->cards()->delete($user->stripe_id, $request->card_id);
            return redirect('payment/show');
        }
}
