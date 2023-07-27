<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClassLevel;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('dashboard.index', compact('user'));
    }
}
