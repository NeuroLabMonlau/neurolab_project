<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Resources\Appointment as AppointmentResource;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Appointment::all();
        return response()->json(AppointmentResource::collection($events));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(Request $request)
    {
        Appointment::create([
            'reason' => $request->title,
            'begin' => $request->start,
            'end' => $request->end,
            'session' => $request->session,
            'booked_by' => $request->user_id, 'user_id' => $request->user_id
        ]);

        return redirect()->back()->with('message', 'Reservado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
