<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function loginPage()
    {
        return view('users.userLogin');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $session_put = Auth::user()->id;
            Session::put('id_user', $session_put);
            $request->session()->regenerate();

            return redirect()->intended('info');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function infoUser()
    {
        $user_session = Session::get('id_user');
        $user = User::find($user_session);

        return view('users.infoUser', compact('user'));
    }
}
