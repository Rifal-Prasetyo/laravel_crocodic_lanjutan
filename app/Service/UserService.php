<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService
{
    public static function ListAllUsers()
    {
        $hasil = UserRepository::ListAllUsers();

        foreach ($hasil as $row) {
            $row->nama_dengan_indonesia = "nama orang ini adalah" . $row->name;
        };

        return $hasil;
    }
}
