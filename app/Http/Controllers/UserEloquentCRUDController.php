<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserEloquentCRUDController extends Controller
{
    public function tampilan_create()
    {
        $result = false;
        return view('users.userCreate', compact('result'));
    }

    public  function createQuery(Request $request)
    {
        User::create([
            'name' => $request->name,

            'email' => $request->email,
            'password' => $request->password
        ]);
        return view('users.userCreate')->with('result', "user Ditambahkan");
    }

    public  function readQuery($id)
    {
        $users = User::find($id);
        return $users;
    }
    public  function updateQueryFrontend($id)
    {
        $result = false;
        $users = User::find($id);
        return view('users.userUpdate', compact('result', 'users'));
    }
    public  function updateQuery(Request $request)
    {

        $users = User::where('id', $request->id);
        $users->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]
        );
        $result = true;
        return "user ke update";
    }
    public  function deleteQuery($id)
    {
        $user = User::find($id);
        $user->delete();

        return "user dengan ID $id Kehapus";
    }
}
