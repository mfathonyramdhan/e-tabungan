<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassLevel;

class ClassLevelsTableSeeder extends Seeder
{
    public function run()
    {
        ClassLevel::insert([
            ['cl_name' => 'Kelas 1'],
            ['cl_name' => 'Kelas 2'],
            ['cl_name' => 'Kelas 3'],
        ]);
    }
}
