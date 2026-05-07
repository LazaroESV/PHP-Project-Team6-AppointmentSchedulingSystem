@extends('layouts.main')

@section('content')

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

    <h2>Book Appointment</h2>
    

    <form method="POST" action="/appointments">

        @csrf

        <div class="mb-3">
            <label>Customer</label>

            <select name="customer_id" id="customer_id" class="form-control">

                @foreach($customers as $customer)

                    <option value="{{ $customer->id }}">
                        {{ $customer->first_name }}
                        {{ $customer->last_name }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Staff Member</label>

            <select name="staff_id" id="staff_id" class="form-control">

                @foreach($staffMembers as $staff)

                    <option value="{{ $staff->id }}">
                        {{ $staff->name }}
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Service</label>

            <select name="service_id" id="service_id" class="form-control">

                @foreach($services as $service)

                    <option value="{{ $service->id }}">
                        {{ $service->name }}
                        ({{ $service->duration }} mins)
                    </option>

                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label>Date</label>

            <input type="date"
                   name="appointment_date"
                   id="appointment_date"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Start Time</label>

            <select name="start_time"
                    id="start_time"
                    class="form-control">

                <option value="">
                    Select Available Time Slot
                </option>

            </select>
        </div>

        <button class="btn btn-primary">
            Book Appointment
        </button>

    </form>

    <!--Implement Dynamic Scheduling-->
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        const staffField = document.getElementById('staff_id');

        const serviceField = document.getElementById('service_id');

        const dateField = document.getElementById('appointment_date');

        const startTimeField = document.getElementById('start_time');

        async function loadAvailableSlots() {

            const staffId = staffField.value;

            const serviceId = serviceField.value;

            const appointmentDate = dateField.value;

            if (!staffId || !serviceId || !appointmentDate) {
                return;
            }

            const response = await fetch(
                "{{ route('appointments.slots') }}",
                {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json',

                        'X-CSRF-TOKEN':
                            '{{ csrf_token() }}'
                    },

                    body: JSON.stringify({
                        staff_id: staffId,
                        service_id: serviceId,
                        appointment_date: appointmentDate
                    })
                }
            );

            const slots = await response.json();

            startTimeField.innerHTML = '';

            if (slots.length === 0) {

                startTimeField.innerHTML =
                    '<option>No Available Slots</option>';

                return;
            }

            slots.forEach(slot => {

                startTimeField.innerHTML += `
                    <option value="${slot}">
                        ${slot}
                    </option>
                `;
            });
        }

        staffField.addEventListener('change', loadAvailableSlots);

        serviceField.addEventListener('change', loadAvailableSlots);

        dateField.addEventListener('change', loadAvailableSlots);
    });

    </script>
</div>

@endsection