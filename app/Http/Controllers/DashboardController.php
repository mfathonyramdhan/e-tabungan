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
        // declarated array
       
        // get current month
        $currentMonth = Transaction::orderBy('datecreated', 'DESC')->first();
        // $myDate =  $currentMonth->datecreated;
     
        $myDate = Carbon::parse($currentMonth->datrcrated);
        $endDate = strtotime($myDate);
        $month = date('m', $endDate);
        $minDate = Carbon::parse($myDate)->subMonths(5)->toDateString();
        // echo $minDate;
        $endDate = strtotime($minDate);
        $minMonth = date('m', $endDate);
        // for ($i=$minMonth; $i <= $month ; $i++) { 
        //        $starDate = new date("Y-m-01",time());
        //        $endDate = new date("Y-m-t",time());
        //     echo  "tanggal Awal :". $starDate;
        //     echo  "</br>";
        //     echo  "tanggal Awal :". $endDate;
        //     echo  "</br>";
        // }
        // dd($minDate);
        $year=date('Y', $endDate);
        // echo $year;
        $date=Carbon::now();
       $s=0;
       
        for($i=$minMonth; $i<=$month; $i++){
            
            $date= new Carbon($year.'-'.$minMonth.'-01');
            $starDate1 = date($date->startOfMonth());
            $endDate1 = date($date->endOfMonth());
            $data = Transaction::select('tr_debt')
            ->whereBetween('datecreated', [$starDate1 , $endDate1  ])
            ->get()->sum('tr_debt');
            // echo $data;
            // echo"<br>";
            // echo"<br>";
            $array = array(
                $s => $data
            );
            $minMonth = $minMonth + 1;
            $s = $s + 1;
        }
        var_dump($array);
        

        $formattedTotalSaldoTabungan = 'Rp ' . number_format($totalSaldoTabungan, 0, ',', '.');

        $totalTabungan = DB::table('transactions')
            ->sum('tr_debt');

        $formattedTotalTabungan = 'Rp ' . number_format($totalTabungan, 0, ',', '.');


        $totalPenarikan = DB::table('transactions')
            ->sum('tr_credit');

        $formattedTotalPenarikan = 'Rp ' . number_format($totalPenarikan, 0, ',', '.');


        // return view('dashboard.index', compact('user', 'formattedTotalSaldoTabungan', 'totalSiswa', 'formattedTotalTabungan', 'formattedTotalPenarikan', 'totalAdminSupervisor'));
    }
}
