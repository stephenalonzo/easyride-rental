<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendReminder;
use App\Mail\ReservationReminder;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
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
    public function sendReminder(SendReminder $request)
    {
        $validated = $request->validated();

        Mail::to($validated['email'])->send(new ReservationReminder($validated['confirm_number']));

        return back()->with([
            'message' => 'Renter reminded',
            'subMessage' => 'The renter of this reservation has been notified by email.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
