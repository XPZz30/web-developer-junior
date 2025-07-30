<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Libraries\Eloquent;
use App\Models\Eloquent\User;

class UsuarioSeeder extends Seeder
{
    public function run()
    {

        Eloquent::boot();

        $user = new User();
        $user->username = 'user';
        $user->email = 'user@teste.com';
        $user->password = password_hash('user', PASSWORD_DEFAULT);
        $user->save();
    }
}
