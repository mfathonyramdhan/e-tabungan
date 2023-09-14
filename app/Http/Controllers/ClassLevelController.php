<?php
// app/Http/Controllers/ClassLevelController.php

namespace App\Http\Controllers;

use App\Models\ClassLevel;
use Illuminate\Http\Request;


class ClassLevelController extends Controller
{
    public function index()
    {
        $classLevels = ClassLevel::orderBy('cl_name')->get();
        return view('class_levels.index', compact('classLevels'));
    }


    public function edit($id)
    {
        $classLevel = ClassLevel::find($id);
        return view('class_levels.edit', compact('classLevel'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'cl_name' => 'required|max:255',
            // Add validation rules for other fields if needed
        ]);

        // Find the class level by id
        $classLevel = ClassLevel::find($id);

        // Update the class level properties
        $classLevel->cl_name = $request->input('cl_name');
        // Update other fields as needed

        // Save the updated class level
        $classLevel->save();

        // Redirect back to the class levels index page with a success message
        return redirect()->route('class-levels')->with('success', 'Class level updated successfully.');
    }

    // app/Http/Controllers/ClassLevelController.php
    // app/Http/Controllers/ClassLevelController.php

    public function create()
    {
        return view('class_levels.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'cl_name' => 'required|max:255',
            // Add validation rules for other fields if needed
        ]);

        // Create a new ClassLevel instance and set its properties
        $classLevel = new ClassLevel();
        $classLevel->cl_name = $request->input('cl_name');
        // Set other fields as needed

        // Save the new class level to the database
        $classLevel->save();

        // Redirect back to the class levels index page with a success message
        return redirect()->route('class-levels')->with('success', 'Class level created successfully.');
    }

    public function destroy($id)
    {
        // Find the class level by id
        $classLevel = ClassLevel::find($id);

        // Check if the class level exists
        if (!$classLevel) {
            return redirect()->route('class-levels')->with('error', 'Class level not found.');
        }

        // Delete the class level
        $classLevel->delete();

        // Redirect back to the class levels index page with a success message
        return redirect()->route('class-levels')->with('success', 'Class level deleted successfully.');
    }

    public function getClassData($id_cl)
    {
        // Fetch the class data based on the selected id_cl
        $classData = [];

        if ($id_cl == 1) {
            $classData = [
                ['value' => 'A', 'text' => 'A'],
                ['value' => 'B', 'text' => 'B'],
            ];
        } elseif ($id_cl == 2) {
            $classData = [
                ['value' => '1', 'text' => '1'],
                ['value' => '2', 'text' => '2'],
                ['value' => '3', 'text' => '3'],
                ['value' => '4', 'text' => '4'],
                ['value' => '5', 'text' => '5'],
                ['value' => '6', 'text' => '6'],
            ];
        } elseif ($id_cl == 3) {
            $classData = [
                ['value' => '1', 'text' => '1'],
                ['value' => '2', 'text' => '2'],
                ['value' => '3', 'text' => '3'],
            ];
        }

        // Return the class data as a JSON response
        return response()->json($classData);
    }
}
