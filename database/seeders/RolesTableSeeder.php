<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            ['role_name' => 'Administrator'],
            ['role_name' => 'Guru'],
            ['role_name' => 'Siswa'],
        ]);
    }
}
