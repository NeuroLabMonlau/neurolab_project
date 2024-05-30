<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
        ]);

        $appointment = Appointment::create($request->all());

        return response()->json($appointment);
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

    public function getAppointmentById($id)
    {
        $appointment = Appointment::find($id);
        return response()->json($appointment);
    }

    public function getAppointmentsBySender($sender_id)
    {
        $appointments = Appointment::where('sender_id', $sender_id)->get();
        return response()->json($appointments);
    }

    public function getAppointmentsByReceiver($receiver_id)
    {
        $appointments = Appointment::where('receiver_id', $receiver_id)->get();
        return response()->json($appointments);
    }


    public function searchUsers(Request $request)
    {
        $search = $request->input('search');

        $users = User::where(function ($query) use ($search) {
            $query->where('username', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })
            ->where('role_id', 3)
            ->paginate(10);


        return response()->json($users);
    }

}
