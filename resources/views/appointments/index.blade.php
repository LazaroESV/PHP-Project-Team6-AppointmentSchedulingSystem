@extends('layouts.main')

@section('content')

<form method="GET"
      action="{{ route('appointments.index') }}"
      class="mb-4">

    <div class="row">

        <div class="col-md-6">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Search customer...">

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary w-100">
                Search
            </button>

        </div>

    </div>

</form>

<div class="container mt-5">

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <h2>Appointments</h2>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>Customer</th>
                <th>Staff</th>
                <th>Service</th>
                <th>Date</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

            @foreach($appointments as $appointment)

                <tr>

                    <td>
                        {{ $appointment->customer->first_name }}
                        {{ $appointment->customer->last_name }}
                    </td>

                    <td>
                        {{ $appointment->staff->name }}
                    </td>

                    <td>
                        {{ $appointment->service->name }}
                    </td>

                    <td>
                        {{ $appointment->appointment_date }}
                    </td>

                    <td>
                        {{ $appointment->start_time }}
                    </td>

                    <td>
                        {{ $appointment->end_time }}
                    </td>

                    <td>

                        @if($appointment->status == 'booked')

                            <span class="badge bg-primary">
                                Booked
                            </span>

                        @elseif($appointment->status == 'completed')

                            <span class="badge bg-success">
                                Completed
                            </span>

                        @elseif($appointment->status == 'cancelled')

                            <span class="badge bg-danger">
                                Cancelled
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($appointment->status == 'booked')

                            <form method="POST"
                                  action="{{ route('appointments.complete', $appointment) }}"
                                  class="d-inline">

                                @csrf
                                @method('PUT')

                                <button class="btn btn-success btn-sm">
                                    Complete
                                </button>

                            </form>

                            <form method="POST"
                                  action="{{ route('appointments.cancel', $appointment) }}"
                                  class="d-inline">

                                @csrf
                                @method('PUT')

                                <button class="btn btn-danger btn-sm">
                                    Cancel
                                </button>

                            </form>

                        @endif

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    {{ $appointments->links() }}

</div>

@endsection