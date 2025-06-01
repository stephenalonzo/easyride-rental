<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reservations.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservations.create');
    }

    // Flash Rental Details
    public function details(Request $request) {
        $validated = $request->validate([
            'pickup' => 'required',
            'dropoff' => 'required',
            'age' => 'required'
        ]);

        // $action = Route::getCurrentRoute()->getActionMethod();

        // if ($request->method() == 'POST' && $action == 'details') {
        //     Session::put('pickup', $validated['pickup']);
        //     Session::put('dropoff', $validated['dropoff']);
        //     Session::put('age', $validated['age']);
        // }
        
        return redirect('/reservations/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required',
            'name' => 'required',
            'number' => 'required',
            'email' => ['required', 'email'],
            'license_number' => 'required',
            'issuing_state' => 'required',
            'exp_date' => 'required',
            'issue_date' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'street_address' => 'required',
            'zip' => 'required'
        ]);

        $validated['pickup'] = session('pickup');
        $validated['dropoff'] = session('dropoff');
        $validated['age'] = session('age');
        $validated['confirm_number'] = '234jgdsfu';

        Reservation::create($validated);

        return redirect('/')->with('message', 'Reservation booked!');
    }

    // Flash Pick-up/Drop-off Location
    public function flush() {
        Session::flush();
        return redirect('/');
    }

    public function search(Request $request) {
        $validated = $request->validate([
            'confirm_number' => 'required',
            'name' => 'required',
            'number' => 'required'
        ]);

        $checkReservation = [
            ['confirm_number', '=', $validated['confirm_number']],
            ['name', '=', $validated['name']],
            ['number', '=', $validated['number']]
        ];
        
        $reservations = Reservation::where($checkReservation)->get();

        foreach ($reservations as $reservation) {
            if ($reservation['confirm_number'] == $validated['confirm_number'] && $reservation['name'] == $validated['name'] && $reservation['number'] == $validated['number']) {
                return view('reservations.show', [
                    'reservation' => $reservation
                ]);
            }
        }
        
        return redirect('/reservations');
    }

    /**
     * Display the specified resource.
     */
    public function show()
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
