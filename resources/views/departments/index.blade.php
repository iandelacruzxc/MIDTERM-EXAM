@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-primary fw-bold">Departments</h2>
        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add Department</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-primary">
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Office</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->office }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure?');">
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
