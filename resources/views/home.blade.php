@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 fw-bold text-primary">National University Management System</h1>
        <div class="row g-4">
            <div class="col-md-3">
                <a href="{{ route('instructors.index') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm" style="background-color: #00205B;">
                        <div class="card-body text-white text-center">
                            <h5 class="card-title">Manage Instructors</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('departments.index') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm" style="background-color: #FFD200;">
                        <div class="card-body text-dark text-center">
                            <h5 class="card-title">Manage Departments</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('students.index') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm" style="background-color: #00205B;">
                        <div class="card-body text-white text-center">
                            <h5 class="card-title">Manage Students</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('courses.index') }}" class="text-decoration-none">
                    <div class="card border-0 shadow-sm" style="background-color: #FFD200;">
                        <div class="card-body text-dark text-center">
                            <h5 class="card-title">Manage Courses</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
