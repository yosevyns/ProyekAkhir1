<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;



class RegisterController extends Controller
{
    public function index(){
        return view('auth.register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' =>'required|email|unique:users',
            'name' =>['required','min:8'],
            'username' =>['required', 'unique:users', 'min:6'],
            'date_of_birth' =>'required',
            'password' =>'required|min:5'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = "user";
        User::create($validatedData);

        Alert::success('Success', 'Anda berhasil melakukan registrasi'); 


        return redirect('/');
    }
}
