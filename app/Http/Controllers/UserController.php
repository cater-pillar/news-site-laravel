<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function store() {
        
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:3']
        ]);

        $user = User::create($attributes);
        // not sure if "remember me" logic works
        // also this needs to be implemented in SessionController as well
        if(request('keep')) {
            auth()->login($user, true);    
        } else {
            auth()->login($user);
        }
        auth()->login($user);
        // issue with success statement, in some cases I need back()
        // and in some cases I need redirect()
        return back()->with('success', 'Uspešno ste registrovali nalog');
    }

    public function create() {
        return view('register-page');
    }
}
