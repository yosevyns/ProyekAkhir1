<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Sukses', 'Anda berhasil masuk');
            return redirect()->intended('/dashboard');
        }
        $user = User::where('email',$request->email)->first();
        $user1 = User::where('email','!=',$request->email)->first();
        if($user){
            if (Hash::check($request->password, $user->password, [])) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }else{
                Alert::error('Error', 'Kata sandi yang anda masukkan salah');
                return back(); 
            }
        }else if($user1){
            if (Hash::check($request->password, $user1->password, [])) {
                Alert::error('Error', 'Email yang anda masukkan salah');
                return back();
            }else{
                Alert::error('Error', 'Email dan kata sandi yang anda masukkan salah'); 
                return back(); 
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
