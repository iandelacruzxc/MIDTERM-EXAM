@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card border-primary shadow-sm">
        <div class="card-header bg-primary text-white fw-bold">
            Student Details
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $student->name }}</h5>
            <p class="card-text">Department: {{ $student->department->name ?? 'N/A' }}</p>
            <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
@endsection
