<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store() {
        //provide validation
        $attributes = request()->validate([
           'email'  => 'required|email',
            'password' => 'required'
        ]);

        //authenticate
        if(auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome, back');

        }

         return back()->withErrors([
            'email' =>'Your provided credentials could not be verified'
        ]);
    }

    public function destroy() {
        auth()->logout();

            return redirect('/')->with('success', 'Goodbye');
    }
}
