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
        auth()->login($user);
        return back()->with('success', 'Uspešno ste registrovali nalog');
    }
}
