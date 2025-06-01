<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Department;
use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['instructor', 'department'])->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $instructors = Instructor::all();
        $departments = Department::all();
        return view('courses.create', compact('instructors', 'departments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'instructor_id' => 'required|exists:instructors,id',
            'department_id' => 'required|exists:departments,id',
            'credit' => 'required|numeric'
        ]);

        Course::create($request->only('title', 'instructor_id', 'department_id', 'credit'));
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $instructors = Instructor::all();
        $departments = Department::all();
        return view('courses.edit', compact('course', 'instructors', 'departments'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'instructor_id' => 'required|exists:instructors,id',
            'department_id' => 'required|exists:departments,id',
            'credit' => 'required|numeric'
        ]);

        $course->update($request->only('title', 'instructor_id', 'department_id', 'credit'));
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
