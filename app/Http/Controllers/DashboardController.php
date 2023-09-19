<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\ClassLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user

        $totalSaldoTabungan = DB::table('transactions')
            ->sum('tr_debt') - DB::table('transactions')
            ->sum('tr_credit');

        $totalSiswa = DB::table('users')
            ->where('id_role', 3)
            ->count();

        $totalAdminSupervisor = DB::table('users')
            ->where('id_role', '!=', 3)
            ->count();
        
        $MaxMonth = Transaction::orderBy('datecreated', 'DESC')->first();
        $myDate =  $MaxMonth->datecreated;
        $MaxDate = strtotime($myDate);
        $month = date('m', $MaxDate);
        // dd($month); 

        $formattedTotalSaldoTabungan = 'Rp ' . number_format($totalSaldoTabungan, 0, ',', '.');

        $totalTabungan = DB::table('transactions')
            ->sum('tr_debt');

        $formattedTotalTabungan = 'Rp ' . number_format($totalTabungan, 0, ',', '.');


        $totalPenarikan = DB::table('transactions')
            ->sum('tr_credit');

        $formattedTotalPenarikan = 'Rp ' . number_format($totalPenarikan, 0, ',', '.');


        return view('dashboard.index', compact('user', 'formattedTotalSaldoTabungan', 'totalSiswa', 'formattedTotalTabungan', 'formattedTotalPenarikan', 'totalAdminSupervisor'));
    }
}
