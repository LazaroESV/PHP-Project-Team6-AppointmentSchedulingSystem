@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">

        <div class="container-fluid py-3">

            <h1 class="display-5 fw-bold">
                Appointment Scheduling System
            </h1>

            <p class="fs-5">
                Manages appointments efficiently.
            </p>

            <a href="{{ route('appointments.index') }}"
               class="btn btn-primary btn-lg">

                View Appointments

            </a>

            <a href="{{ route('appointments.create') }}"
               class="btn btn-success btn-lg">

                Book an Appointment

            </a>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h5>Total Appointments</h5>

                    <h2>{{ $appointmentsCount }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h5>Customers</h5>

                    <h2>{{ $customersCount }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h5>Staff Members</h5>

                    <h2>{{ $staffCount }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h5>Booked Appointments</h5>

                    <h2>{{ $bookedCount }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-4">

            <div class="card shadow-sm">

                <div class="card-body">

                    <h5>Completed Appointments</h5>

                    <h2>{{ $completedCount }}</h2>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
