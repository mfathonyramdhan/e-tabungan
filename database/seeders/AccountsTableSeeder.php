<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        Account::insert([
            [
                'acc_unique_num' => '1234567890',
                'acc_birthplace' => 'Jakarta',
                'acc_datebirth' => '1995-12-15',
                'acc_name' => 'John Doe',
                'acc_address' => 'Jl. Menteng No. 123',
                'acc_phone' => '+62 812-3456-7890',
                'acc_religion' => 'Islam',
                'acc_gender' => 'Laki-laki',
                'acc_email' => 'john.doe@email.com',
                'acc_password' => Hash::make('password123'), // Replace 'password123' with the actual password
                'acc_class' => 'Kelas 1',
                'id_role' => 1,
                'id_cl' => 1,
            ],
            [
                'acc_unique_num' => '0987654321',
                'acc_birthplace' => 'Bandung',
                'acc_datebirth' => '1990-08-23',
                'acc_name' => 'Jane Smith',
                'acc_address' => 'Jl. Cihampelas No. 456',
                'acc_phone' => '+62 812-9876-5432',
                'acc_religion' => 'Kristen',
                'acc_gender' => 'Perempuan',
                'acc_email' => 'jane.smith@email.com',
                'acc_password' => Hash::make('mypassword321'), // Replace 'mypassword321' with the actual password
                'acc_class' => 'Kelas 2',
                'id_role' => 2,
                'id_cl' => 2,
            ],
            [
                'acc_unique_num' => '5678901234',
                'acc_birthplace' => 'Surabaya',
                'acc_datebirth' => '2005-03-10',
                'acc_name' => 'Michael Johnson',
                'acc_address' => 'Jl. Gubeng Kertajaya 789',
                'acc_phone' => '+62 821-2345-6789',
                'acc_religion' => 'Hindu',
                'acc_gender' => 'Laki-laki',
                'acc_email' => 'michael.j@example.com',
                'acc_password' => Hash::make('securepass987'), // Replace 'securepass987' with the actual password
                'acc_class' => 'Kelas 3',
                'id_role' => 3,
                'id_cl' => 3,
            ],
        ]);
    }
}
