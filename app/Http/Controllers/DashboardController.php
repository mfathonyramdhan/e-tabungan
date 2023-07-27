<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClassLevel;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function satdik_rd()
    {
        $classLevels = ClassLevel::all();

        return view('dashboard.satdik_rd', compact('classLevels'));
    }
}
