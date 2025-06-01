@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-primary fw-bold">Courses</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add Course</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-primary shadow-sm">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Instructor</th>
                        <th>Department</th>
                        <th>Credit</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->instructor->name ?? 'N/A' }}</td>
                            <td>{{ $course->department->name ?? 'N/A' }}</td>
                            <td>{{ $course->credit }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
