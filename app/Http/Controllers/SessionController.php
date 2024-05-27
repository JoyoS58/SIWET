<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class SessionController extends Controller
{ 
    public function index()
    {
        return  view("login");

    }

    // public function login(Request $request)
    // {
    //     Session::flash('username',$request->usename);
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ],[
    //         'username.required' => 'Username Wajid diisi',
    //         'password.required' => 'Password Wajib Diisi' ,
    //     ]);

    //     $infologin = [
    //         'username' =>$request->username,
    //         'password' => $request->Password
    //     ];

    //     if(Auth::attempt($infologin)){
    //         return redirect('welcome')->with('succes', 'Berhasil login');

    //     }else {
    //         return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');

    //     }


    // }

    public function login(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];
        dd($request);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Redirect sesuai level user setelah login
            if ($user->level === 'adminrw') {
                return redirect()->intended('RW');
            } elseif ($user->level === 'adminpkk') {
                return redirect()->intended('PKK');
            }

        } else {
            return redirect('sesi')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/sesi')->with('success', 'Berhasil logout');
    }


    
}
