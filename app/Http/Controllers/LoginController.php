<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'username'=> 'required',
            'password'=> 'required',
        ]);

        $credentials = $request->only('username','password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->level == 'adminRW') {
                return redirect()->intended('RW.Kegiatan.index');
            }
        }
    }
}
