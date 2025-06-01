@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-primary fw-bold">Instructors</h2>
    <a href="{{ route('instructors.create') }}" class="btn btn-primary mb-3">Add Instructor</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-primary shadow-sm">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instructors as $instructor)
                        <tr>
                            <td>{{ $instructor->id }}</td>
                            <td>{{ $instructor->name }}</td>
                            <td>{{ $instructor->email }}</td>
                            <td>
                                <a href="{{ route('instructors.edit', $instructor->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
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
