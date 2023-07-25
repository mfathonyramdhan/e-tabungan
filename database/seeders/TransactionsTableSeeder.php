<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionsTableSeeder extends Seeder
{
    public function run()
    {
        Transaction::insert([
            ['id_acc' => 1, 'tr_debt' => 1000.00, 'tr_credit' => 0.00, 'datecreated' => '2023-07-26 09:00:00'],
            ['id_acc' => 2, 'tr_debt' => 0.00, 'tr_credit' => 500.00, 'datecreated' => '2023-07-26 09:15:00'],
            ['id_acc' => 3, 'tr_debt' => 200.00, 'tr_credit' => 0.00, 'datecreated' => '2023-07-26 11:45:00'],
        ]);
    }
}
