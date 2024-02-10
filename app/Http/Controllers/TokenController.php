<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    //

    public function tokenFrontend()
    {
        return view('users.accessToken');
    }

    public function tokenSuccess()
    {
        return "Berhasil Masuk";
    }
}
