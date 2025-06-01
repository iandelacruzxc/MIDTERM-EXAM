@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border-primary shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            Edit Instructor
        </div>
        <div class="card-body">
            <form action="{{ route('instructors.update', $instructor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $instructor->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $instructor->email }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('instructors.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
