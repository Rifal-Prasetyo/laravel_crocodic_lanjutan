<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public static function ListAllUsers()
    {
        return User::all();
    }
}
