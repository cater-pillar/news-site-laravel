<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SessionController extends Controller
{
    public function destroy() {
        auth()->logout();
        
        return back()->with('success', 'Uspešno ste se odjavili');
    }


    public function store() {
        $attributes = request()->validate([
            'email' => ['required', Rule::exists('users','email')],
            'password' => ['required']
       ]);
       
       if (auth()->attempt($attributes)) {
            session()->regenerate();
        return back()->with('success', 'Uspešno ste se ulogovali');
       }
        return back()->withInput()->withErrors(['password' => 'Pogrešna lozinka.']);
    }
}
