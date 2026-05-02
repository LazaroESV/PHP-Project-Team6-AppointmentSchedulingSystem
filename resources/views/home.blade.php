@extends('layouts.main')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
    <div class="container-fluid py-3">
        <h1 class="display-6 fw-bold">Student Records Portal</h1>
        <p class="col-md-9 fs-5">
            This Laravel application allows staff to create, view, edit, update, and delete student records.
        </p>
        <a href="{{ route('students.index') }}" class="btn btn-primary btn-lg">View Students</a>
    </div>
</div>
@endsection
