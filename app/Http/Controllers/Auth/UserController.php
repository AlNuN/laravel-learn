<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user();
        return view('auth.user', compact('user'));
    }

    public function update(Request $request, User $user) {
        if ($request->has('password')){
            $attributes = request()->validate([
                'lastPassword' => ['required', 'max:255',
                function($attribute, $value, $fail){
                    if (! Hash::check($value, auth()->user()->password)){
                        $fail('The password is incorrect');
                    }
                }],
                'newPassword' => ['required', 'confirmed', 'different:lastPassword', 'min:3']
            ]);
            $user->password = Hash::make($attributes['newPassword']);
            $user->save();
            return redirect('/user')->with('status', 'Your password was successfully changed!');

        } elseif ($request->has('email')){
            $validator = Validator::make( $request->all(), [
                'newEmail' => ['required', 'e-mail', 'confirmed', 'unique:users,email']
            ]);
            if($validator->fails()){
                return redirect('/user')
                    ->withErrors($validator, 'email')
                    ->withInput();
            } else{
                $user->email = $request->newEmail;
                $user->save();
                return redirect('/user')->with('status', 'Your e-mail was successfully changed!');
            }
            // dd($attributes)->withErrors($attributes, 'email');
        }


    }

}
