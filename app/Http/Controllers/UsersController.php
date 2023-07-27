<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\ClassLevel;

class UsersController extends Controller
{
    public function index()
    {
        // Use the 'join' method to perform a SQL join between 'users' and 'class_levels' tables
        $users = User::join('class_levels', 'users.id_cl', '=', 'class_levels.cl_id')
            ->select('users.*', 'class_levels.cl_name')
            ->get();

        return view('users.index', compact('users'));
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
        // Validate the request data
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email|unique:users,email',
            'id_role' => 'required|exists:roles,role_id',
            'id_cl' => 'required|exists:class_levels,cl_id',
            'acc_class' => 'required|max:255',
            'acc_gender' => 'required|in:Laki - Laki,Perempuan',
            'password' => 'nullable|min:8|confirmed', // Make the password field nullable

        ]);

        // Create a new user and set its properties
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->id_role = $request->input('id_role');
        $user->id_cl = $request->input('id_cl');
        $user->acc_class = $request->input('acc_class');
        $user->acc_gender = $request->input('acc_gender');
        // Check if the password is provided and hash it before storing it
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        // Save the user to the database
        $user->save();

        // Redirect back to the index page with a success message
        return redirect()->route('users.index')->with('success', 'New user added successfully.');
    }
}
