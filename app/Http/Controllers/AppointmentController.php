<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Staff;
use App\Models\Service;


use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with([
            'customer',
            'staff',
            'service'
        ]);

        if ($request->search) {

            $query->whereHas('customer', function ($q) use ($request) {

                $q->where('first_name', 'like',
                    '%' . $request->search . '%')

                ->orWhere('last_name', 'like',
                    '%' . $request->search . '%');
            });
        }

        $appointments = $query
            ->latest()
            ->paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $customers = Customer::all();

        $staffMembers = Staff::all();

        $services = Service::all();

        return view('appointments.create', compact(
            'customers',
            'staffMembers',
            'services'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'staff_id' => 'required',
            'service_id' => 'required',
            'appointment_date' => 'required|date',
            'start_time' => 'required',
        ]);

        $service = Service::findOrFail($request->service_id);

        // No double booking
        $existingAppointment = Appointment::where('staff_id', $request->staff_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('start_time', $request->start_time)
            ->where('status', 'booked')
            ->exists();

        if ($existingAppointment) {

            return back()
                ->withInput()
                ->withErrors([
                    'start_time' => 'This time slot is already booked.'
                ]);
        }

        // Daily booking limit = 5 per staff
        $dailyAppointments = Appointment::where('staff_id', $request->staff_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('status', 'booked')
            ->count();

        if ($dailyAppointments >= 5) {

            return back()
                ->withInput()
                ->withErrors([
                    'limit' => 'Daily booking limit reached for this staff member.'
                ]);
        }

        // Staff availability
        $staff = Staff::findOrFail($request->staff_id);

        if (!$staff->is_available) {

            return back()
                ->withInput()
                ->withErrors([
                    'staff' => 'Selected staff member is unavailable.'
                ]);
        }

        $start = \Carbon\Carbon::parse($request->start_time);

        $end = $start->copy()->addMinutes($service->duration);

        Appointment::create([
            'customer_id' => $request->customer_id,
            'staff_id' => $request->staff_id,
            'service_id' => $request->service_id,
            'appointment_date' => $request->appointment_date,
            'start_time' => $start->format('H:i:s'),
            'end_time' => $end->format('H:i:s'),
            'status' => 'booked'
        ]);

        return redirect('/appointments')
            ->with('success', 'Appointment booked successfully.');
    }

    public function availableSlots(Request $request)
    {
        $service = Service::findOrFail($request->service_id);

        $duration = $service->duration;

        $startTime = \Carbon\Carbon::parse('09:00');

        $endTime = \Carbon\Carbon::parse('17:00');

        $slots = [];

        while ($startTime < $endTime) {

            $slotStart = $startTime->format('H:i:s');

            $exists = Appointment::where('staff_id', $request->staff_id)
                ->where('appointment_date', $request->appointment_date)
                ->where('start_time', $slotStart)
                ->where('status', 'booked')
                ->exists();

            if (!$exists) {

                $slots[] = $startTime->format('H:i');
            }

            $startTime->addMinutes($duration);
        }

        return response()->json($slots);
    }

    public function complete(Appointment $appointment)
    {
        $appointment->status = 'completed';

        $appointment->save();

        return back()->with(
            'success',
            'Appointment completed successfully.'
        );
    }

    public function cancel(Appointment $appointment)
    {
        $appointmentDateTime = Carbon::parse(
            $appointment->appointment_date . ' ' .
            $appointment->start_time
        );

        $cutoff = now()->addHours(2);

        if ($appointmentDateTime <= $cutoff) {

            return back()->withErrors([
                'cancel' =>
                    'Appointments cannot be cancelled within 2 hours.'
            ]);
        }

        $appointment->status = 'cancelled';

        $appointment->save();

        return back()->with(
            'success',
            'Appointment cancelled successfully.'
        );
    }
}
