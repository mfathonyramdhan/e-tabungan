<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\ClassLevel;


use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function index()
    {
        // Use the 'leftJoin' method to perform SQL LEFT JOINs between 'users', 'class_levels', and 'roles' tables
        $users = User::leftJoin('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->leftJoin('roles', 'users.id_role', '=', 'roles.role_id')
            ->where('roles.role_id', '!=', 3)
            ->select('users.*', 'class_levels.cl_name', 'roles.role_name')
            ->get();

        return view('users.index', compact('users'));
    }

    public function siswa()
    {
        // Use the 'leftJoin' method to perform SQL LEFT JOINs between 'users', 'class_levels', and 'roles' tables
        $users = User::leftJoin('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->leftJoin('roles', 'users.id_role', '=', 'roles.role_id')
            ->where('roles.role_id', '=', 3)
            ->select('users.*', 'class_levels.cl_name', 'roles.role_name')
            ->get();

        return view('users.siswa', compact('users'));
    }



    public function create()
    {
        // If you need to fetch any additional data for the form, you can do it here.
        // For example, if you want to display class_levels data in a dropdown, you can fetch it like this:
        // $classLevels = \App\Models\ClassLevel::all();
        $roles = Role::all();
        $classLevels = ClassLevel::all();
        return view('users.create', compact('roles', 'classLevels')); // Pass any additional data you need to the view, if necessary.
    }

    public function store(Request $request)
    {
        // Create a new user and set its properties 
        $user = new User();
        $user->name = $request->input('name');

        if ($request->has('email_input')) {
            $user->email = $request->input('email_input');
        }

        $user->id_role = $request->input('id_role');

        if ($request->has('id_cl')) {
            $user->id_cl = $request->input('id_cl');
        }

        if ($request->has('acc_class')) {
            $user->acc_class = $request->input('acc_class');
        }

        if ($request->has('acc_nis')) {
            $user->nis = $request->input('acc_nis');
        }

        if ($request->has('ta')) {
            $user->ta = $request->input('ta');
        }

        if ($request->has('status')) {
            $user->status = $request->input('status');
        }

        if ($request->has('acc_parents')) {
            $user->acc_parents = $request->input('acc_parents');
        }

        if ($request->has('acc_address')) {
            $user->acc_address = $request->input('acc_address');
        }

        if ($request->has('acc_phone')) {
            $user->acc_phone = $request->input('acc_phone');
        }


        $user->acc_gender = $request->input('acc_gender');

        // Check if the password is provided and hash it before storing it
        if ($request->has('password_input')) {
            $user->password = bcrypt($request->input('password_input'));
        }

        // Save the user to the database
        $user->save();

        // Redirect back to the index page with a success message
        return redirect()->route('users.create')->with('success', 'New user added successfully.');
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
