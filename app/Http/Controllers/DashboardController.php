<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\ClassLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;


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
        // cahrt Bar logic
        $currentMonth = Transaction::orderBy('datecreated', 'DESC')->first();
        $myDate = Carbon::parse($currentMonth->datrcrated);
        $endDate = strtotime($myDate);
        $month = date('m', $endDate);
        $minDate = Carbon::parse($myDate)->subMonths(5)->toDateString();
        $date1 = new Carbon($minDate);
        $date2 = new Carbon($myDate);
        $starDate1 = date($date1->startOfMonth());
        $endDate1 = date($date2->endOfMonth());
        $dataBar1 = Transaction::select(DB::raw("SUM(tr_debt) AS debt"))
        ->whereBetween('datecreated', [$starDate1 , $endDate1 ])
        ->groupBy(DB::raw("MONTH(datecreated)"))
        ->get();
        $resultArray = $dataBar1->toArray();
        $dataBr = Arr::flatten($resultArray);
        for ($i=0; $i <=5 ; $i++) { 
            $newDateTime = Carbon::parse($starDate1)->addMonth($i)->toDateString();
            $str = strtotime($newDateTime);
            
            $dataBulan[$i] = date('M', $str);
            
        }
        $dataYAxis = Arr::flatten($dataBulan);
        // end chart bar
        // dd($dataYAxis);

        

        $formattedTotalSaldoTabungan = 'Rp ' . number_format($totalSaldoTabungan, 0, ',', '.');

        $totalTabungan = DB::table('transactions')
            ->sum('tr_debt');

        $formattedTotalTabungan = 'Rp ' . number_format($totalTabungan, 0, ',', '.');


        $totalPenarikan = DB::table('transactions')
            ->sum('tr_credit');

        $formattedTotalPenarikan = 'Rp ' . number_format($totalPenarikan, 0, ',', '.');


        return view('dashboard.index', compact('user', 'formattedTotalSaldoTabungan', 'totalSiswa', 'formattedTotalTabungan', 'formattedTotalPenarikan', 'totalAdminSupervisor','dataBr','dataYAxis'));
    }
}
