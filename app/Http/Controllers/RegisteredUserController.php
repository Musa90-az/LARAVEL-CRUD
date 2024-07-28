<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){


        $attributes = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(6), 'confirmed'] //password_confirmation
        ]);
        
    
        $user = User::create($attributes);
        Auth::login($user);

    
        return redirect('jobs'); 
    }
    
}
