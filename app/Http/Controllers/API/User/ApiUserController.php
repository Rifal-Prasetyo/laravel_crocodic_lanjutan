<?php

namespace App\Http\Controllers\API\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Exception;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends ApiController // Extend ke ApiController.php bukan Controller.php
{
    //
    public function index(Request $request)
    {
        $result = User::select(['id', 'name'])
            ->latest('id')
            ->get();
        // $result = []; //data diambil dari User nantinya
        return $this->sendSuccess($result, "Berhasil");
    }


    public function show(Request $request, $id)
    {
        $result = User::find($id);
        return $this->sendSuccess($result, "Berhasil mendapatkan data dengan ID $id");
    }

    public function post(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'password' => 'required'
        ]);
        // hash Password
        $hashPassword = Hash::make($validate['password']);
        if ($validate) {
            try {
                User::create([
                    'name' => $validate['name'],
                    'password' => $hashPassword
                ]);
                return $this->sendMessage("Berhasil Menambahkan Record ke tabel USER");
            } catch (Exception $e) {

                return $this->sendForbidden("GAGAL!!! " + $e->getMessage());
            }
        }
    }

    public function update(Request $request, $id)
    {
        // VALIDASI DATA
        $validate = $request->validate([
            'id' => 'required',
            'name' => 'required|min:3',
            'password' => 'required'
        ]);
        // HASHING SANDI
        $hashPassword = Hash::make($validate['password']);

        //KONDISI
        if ($validate) {
            $getUser = User::find($id);
            $getUser->update([
                'name' => $validate['name'],
                'password' => $hashPassword
            ]);
            return $this->sendMessage("Berhasil Mengupdate Record ke tabel USER dengan ID $id");
        }
    }

    public function destroy(Request $request, $id)
    {
        $getUser = User::find($id);
        $getUser->delete();
        return $this->sendMessage("Berhasil Menghapus Record dari tabel USER dengan ID $id");
    }
}
