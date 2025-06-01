<?php

// app/Http/Controllers/StudentController.php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     public function assignCourses(Request $request, Student $student)
{
    $request->validate([
        'courses' => 'array',
        'courses.*' => 'exists:courses,id',
    ]);

    $oldCourses = $student->courses->pluck('id')->toArray();
    $newCourses = $request->courses ?? [];

    $removedCourseIds = array_diff($oldCourses, $newCourses);
    $removedCourses = Course::whereIn('id', $removedCourseIds)->pluck('title')->toArray();

    $student->courses()->sync($newCourses);

    // Always flash success message
    session()->flash('success', 'Courses assigned successfully.');

    // Flash removed courses only if any
    if (count($removedCourses) > 0) {
        session()->flash('removed_courses', $removedCourses);
    }

    return redirect()->route('students.index');
}

    // Display a listing of the resource.
    public function index()
    {
        $students = Student::with('department')->get();
        return view('students.index', compact('students'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $departments = Department::all();
        return view('students.create', compact('departments'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Student::create($request->only('name', 'department_id'));

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    // Show the form for editing the specified resource.
    public function edit(Student $student)
    {
        $departments = Department::all();
        return view('students.edit', compact('student', 'departments'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $student->update($request->only('name', 'department_id'));

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

public function assignCoursesForm(Student $student)
{
    $courses = Course::all();
    $assignedCourseIds = $student->courses->pluck('id')->toArray(); // currently assigned course IDs

    return view('students.assign_courses', compact('student', 'courses', 'assignedCourseIds'));
}




}


