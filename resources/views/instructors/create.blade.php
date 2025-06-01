@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border-primary shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            Add Instructor
        </div>
        <div class="card-body">
            <form action="{{ route('instructors.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('instructors.index') }}" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
