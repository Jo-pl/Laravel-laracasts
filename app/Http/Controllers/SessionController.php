<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt($attributes)){
            return redirect('/')->with('success', 'Welcome back');
        }
        session()->regenerate();
        return back()->withErrors(['email'=>'Your provided credentials could not be verified'])->withInputs(['email']);
        //equivalent:
        //throw ValidationException::withMessages([
        //    'email'=>'Your provided credentials could not be verified'
        //]);
    }
}
