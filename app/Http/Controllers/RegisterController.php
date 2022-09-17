<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'Register'
    
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request ->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|string|min:5|max:255',
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('status', 'Task was successful!');

        // $request->session()->flash('success','anda berhasil mendaftar');

        return redirect('/login')->with('success', 'Anda Berhasil Mendaftar');
    }
}
