<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index()
    {
        $instructors = Instructor::all();
        return view('instructors.index', compact('instructors'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email'
        ]);

        Instructor::create($request->only('name', 'email'));

        return redirect()->route('instructors.index')->with('success', 'Instructor created successfully.');
    }

    public function edit(Instructor $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:instructors,email,' . $instructor->id
        ]);

        $instructor->update($request->only('name', 'email'));

        return redirect()->route('instructors.index')->with('success', 'Instructor updated successfully.');
    }

    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructors.index')->with('success', 'Instructor deleted successfully.');
    }
}
