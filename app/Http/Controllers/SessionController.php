<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();

        return redirect('/');
    }


    public function store() {
        $attributes = request()->validate([
            'name' => ['required', Rule::exists('users','name')],
            'password' => ['required']
       ]);
       dd(auth()->attempt($attributes));
       if (auth()->attempt($attributes)) {
            session()->regenerate();
        //    return redirect('/')->with('success', 'You have logged in successfully!');
       }
    //   return back()->withInput()->withErrors(['password' => 'Wrong password.']);
    }
}
