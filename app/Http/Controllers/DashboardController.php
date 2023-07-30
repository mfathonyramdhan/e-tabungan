<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $formattedTotalSaldoTabungan = 'Rp ' . number_format($totalSaldoTabungan, 0, ',', '.');


        return view('dashboard.index', compact('user', 'formattedTotalSaldoTabungan', 'totalSiswa'));
    }
}
