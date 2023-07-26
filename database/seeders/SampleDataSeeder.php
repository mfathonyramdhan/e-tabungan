<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Seed roles table with sample Indonesian data
        DB::table('roles')->insert([
            ['role_name' => 'Admin'],
            ['role_name' => 'Pengguna'],
            ['role_name' => 'Moderator'],
        ]);

        // Seed class_levels table with sample Indonesian data
        DB::table('class_levels')->insert([
            ['cl_name' => 'Kelas 1'],
            ['cl_name' => 'Kelas 2'],
            ['cl_name' => 'Kelas 3'],
        ]);

        // Seed users table with sample Indonesian data
        DB::table('users')->insert([
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password123'),
                'acc_unique_num' => 'AB12345678',
                'acc_birthplace' => 'Jakarta',
                'acc_datebirth' => '1995-08-10',
                'acc_address' => 'Jl. Merdeka No. 123',
                'acc_phone' => '081234567890',
                'acc_religion' => 'Islam',
                'acc_gender' => 'Laki-laki',
                'acc_class' => 'Kelas 2',
                'id_role' => 1,
                'id_cl' => 2,
            ],

            [
                'name' => 'Rina Dewi',
                'email' => 'rina@example.com',
                'password' => Hash::make('password123'),
                'acc_unique_num' => 'CD87654321',
                'acc_birthplace' => 'Surabaya',
                'acc_datebirth' => '1992-05-25',
                'acc_address' => 'Jl. Pahlawan No. 789',
                'acc_phone' => '087654321098',
                'acc_religion' => 'Kristen',
                'acc_gender' => 'Perempuan',
                'acc_class' => 'Kelas 3',
                'id_role' => 2, // Assuming 'Pengguna' role
                'id_cl' => 3, // Assuming 'Kelas 3'
            ],
            [
                'name' => 'Hendra Wijaya',
                'email' => 'hendra@example.com',
                'password' => Hash::make('password123'),
                'acc_unique_num' => 'EF54321876',
                'acc_birthplace' => 'Medan',
                'acc_datebirth' => '1988-11-12',
                'acc_address' => 'Jl. Medan Baru No. 456',
                'acc_phone' => '089876543210',
                'acc_religion' => 'Islam',
                'acc_gender' => 'Laki-laki',
                'acc_class' => 'Kelas 2',
                'id_role' => 2, // Assuming 'Pengguna' role
                'id_cl' => 2, // Assuming 'Kelas 2'
            ],
            // Add more users here
        ]);

        // Seed transactions table with sample data (you can add more data as needed)
        DB::table('transactions')->insert([
            [
                'id_acc' => 1,
                'tr_debt' => 1000,
                'tr_credit' => 0,
                'datecreated' => now(),
                'datemodified' => NULL,
            ],
            // Add more transactions here
        ]);
    }
}
