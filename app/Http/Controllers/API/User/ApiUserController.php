<?php

namespace App\Http\Controllers\API\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ApiUserController extends ApiController // Extend ke ApiController.php bukan Controller.php
{
    //
    public function index(Request $request)
    {

        $result = []; //data diambil dari User nantinya
        return $this->sendSuccess($result, "Berhasil");
    }


    public function show(Request $request, $id)
    {
    }

    public function post(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request, $id)
    {
    }
}
