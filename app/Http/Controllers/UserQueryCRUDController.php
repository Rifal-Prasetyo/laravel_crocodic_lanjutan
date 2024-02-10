<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserQueryCRUDController extends Controller
{
    public function tampilan_create()
    {
        $result = false;
        return view('users.userCreate', compact('result'));
    }

    public  function createQuery(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,

            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return view('users.userCreate')->with('result', "user Ditambahkan");
    }

    public  function readQuery($id)
    {

        $users = DB::table('users')->where('id', $id)->get();
        return $users;
    }
    public  function updateQueryFrontend($id)
    {
        $result = false;
        $users = DB::table('users')->find($id);
        return view('users.userUpdate', compact('result', 'users'));
    }
    public  function updateQuery(Request $request)
    {

        $users = DB::table('users')->where('id', $request->id);
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
        $user = DB::table('users')->where('id', $id);
        $user->delete();

        return "user dengan ID $id Kehapus";
    }
}
