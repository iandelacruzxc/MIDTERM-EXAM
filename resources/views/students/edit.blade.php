@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border-primary shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            Edit Student
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="department_id" class="form-label fw-semibold">Department</label>
                    <select id="department_id" name="department_id" class="form-select" required>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ (old('department_id', $student->department_id) == $department->id) ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
