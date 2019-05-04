<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

/**
 * User Authorization in Laravel 5.4 with Spatie Laravel-Permission
 * https://scotch.io/tutorials/user-authorization-in-laravel-54-with-spatie-laravel-permission
 * Some parts of the following code are from the tutorial above
 */

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller
{
    /**
     * Manage permissions.
     */
    public function __construct()
    {
        $this->middleware('role:admin', ['only' => ['index',
            'create',
            'store',
            'destroy',
            ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('seller')) {
            $user->assignRole('seller');
        }

        return redirect()->route('home')
            ->with('flash_message', 'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->id == auth()->user()->id || auth()->user()->hasRole('admin')) {
            return view('users.edit', compact('user'));
        }
        else {
            abort(403, "You don't have the permission to edit this user.");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->id == auth()->user()->id || auth()->user()->hasRole('admin')) {
            $this->validate($request, [
                'name'=>'required|max:120|unique:users',
                'email'=>'required|email|unique:users,email,'.$user->id,
                'password'=>'required|min:6|confirmed',
                'firstname' =>'nullable',
                'lastname' => 'nullable',
                'address1' => 'nullable',
                'address2' => 'nullable',
                'city' => 'nullable',
                'postal' => 'nullable',
                'country' => 'nullable',
                'phone' => 'nullable|numeric',
                'user_image' => 'nullable|image|max:10000',
                'background_image' => 'nullable|image|max:10000',
            ]);

            $user->update(request(['name', 'email', 'firstname', 'lastname', 'address1', 'address2', 'city', 'postal', 'country', 'phone']));
            $password = Hash::make($request->password);
            $user->password = $password;

            if (!is_null($request->user_image)) {
                $request->user_image->store('public');
                $url = Storage::url($request->user_image->hashName());
                $user->update(request(['name', 'descriptions', 'price', 'units', 'category']));
                $user->user_image = $url;
            }
            if (!is_null($request->background_image)) {
                $request->background_image->store('public');
                $url = Storage::url($request->background_image->hashName());
                $user->update(request(['name', 'descriptions', 'price', 'units', 'category']));
                $user->background_image = $url;
            }
            $user->save();

            if ($request->has('seller')) {
                $user->assignRole('seller');
            }
            else {
                $user->removeRole('seller');
            }

            return redirect()->route('home')
                ->with('flash_message',
                'User successfully edited.');
        }
        else {
            abort(403, "You don't have the permission to edit this user.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully deleted.');
    }
}
