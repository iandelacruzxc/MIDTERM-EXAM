@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-primary fw-bold">Assign Courses to {{ $student->name }}</h2>

    <form action="{{ route('students.assign-courses.store', $student->id) }}" method="POST">
        @csrf

        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 mb-3">
                    <div class="card border-primary shadow-sm h-100">
                        <div class="card-body d-flex align-items-center">
                            <input class="form-check-input me-3" type="checkbox" name="courses[]" value="{{ $course->id }}" id="course{{ $course->id }}"
                                {{ in_array($course->id, $assignedCourseIds) ? 'checked' : '' }}>
                            <label class="form-check-label mb-0 fw-semibold" for="course{{ $course->id }}">
                                {{ $course->title }}
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary me-2">Assign Courses</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
