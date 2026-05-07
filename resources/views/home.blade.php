@extends('layouts.main')

@section('content')
<div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
    <div class="container-fluid py-3">
        <h1 class="display-6 fw-bold">Appointment Scheduling System</h1>
        <p class="col-md-9 fs-5">
            This Laravel application allows customers to schedule appointments with staff members.
        </p>
        <a href="{{ route('appointments.index') }}"
            class="btn btn-primary btn-lg">
                View Appointments
        </a>
    </div>
</div>
@endsection
