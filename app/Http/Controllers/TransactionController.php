<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\ClassLevel;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function index()
    {

        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
            ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
            ->get();

        // Retrieve all transactions from the database 

        return view('transactions.index', compact('transactions'));
    }

    public function printTransaction(Transaction $transaction)
    {
        return view('transactions.printbyid', compact('transaction'));
    }


    public function print()
    {
        // Retrieve all transactions from the database and group them by account
        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
            ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
            ->orderBy('datecreated', 'asc') // Order by datecreated in ascending order
            ->get()
            ->groupBy('id_acc'); // Group transactions by id_acc (account ID)

        return view('transactions.print', compact('transactions'));
    }
    public function printSelection(Request $request)
    {
        // Retrieve all transactions from the database and group them by account
        // $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
        //     ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
        //     ->select('transactions.*', 'users.name as acc_name', 'users.acc_class', 'class_levels.cl_name')
        //     ->orderBy('datecreated', 'asc') // Order by datecreated in ascending order
        //     ->get()
        //     ->groupBy('id_acc'); // Group transactions by id_acc (account ID)

        
        $daterange = $request->input('daterange');
        $dates = explode(' - ' ,$daterange);
        $minDate = strtotime($dates[0]);
        $MaxDate = strtotime($dates[1]);
        $awalCetak = date('Y-m-d', $minDate);
        $akhirCetak = date('Y-m-d', $MaxDate);
        $transactions = Transaction::join('users', 'transactions.id_acc', '=', 'users.id')
        ->join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
        ->select('transactions.*', 'users.name AS acc_name', 'users.acc_class', 'class_levels.cl_name')
        ->whereBetween('datecreated', [$awalCetak, $akhirCetak])
        ->orderBy('datecreated', 'asc') // Order by datecreated in ascending order
        ->get()
        ->groupBy('id_acc');
        // dd($transactions);
        // foreach ($transactions as $row){
        //     echo "cetak tanggal  :". $row->acc_name;
        //     echo "<br>";
        // }
        return view('transactions.printSelection', compact('transactions'));
    }


    public function destroy(Transaction $transaction)
    {
        // Perform the deletion
        $transaction->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }



    public function create()
    {
        // Assuming you need to fetch some data from other models for the form, you can do it here.
        // For example, if you need a list of users and class levels for dropdowns:
        $users = User::where('id_role', 3)->get();
        $classLevels = ClassLevel::all();

        return view('transactions.create', compact('users', 'classLevels'));
    }

    public function store(Request $request)
    {
        // Generate a random 10-digit number for tr_id
        $tr_id = mt_rand(1000000000, 9999999999);

        // Create a new transaction and set its properties
        $transaction = new Transaction();
        $transaction->tr_id = $tr_id;
        $transaction->id_acc = $request->input('id_acc');
        $transaction->tr_debt = $request->has('tr_debt') ? $request->input('tr_debt') : null;
        $transaction->tr_credit = $request->has('tr_credit') ? $request->input('tr_credit') : null;

        // Save the transaction to the database
        $transaction->save();

        // Redirect back to the index page with a success message
        return redirect()->route('transactions.index')->with('success', 'New transaction added successfully.');
    }
}
