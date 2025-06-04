<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ShowReservation;
use App\Http\Requests\StoreReservation;
use App\Models\VehicleEquipment;
use App\Models\VehicleProtectionProduct;

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
    public function create(Request $request)
    {
        return view('reservations.create', [
            'request' => $request,
            'vehicles' => Vehicle::all()
        ]);
    }

    // Flash Rental Details
    public function details(Request $request) {
        return view('/reservations/create', [
            'request' => $request,
            'vehicles' => Vehicle::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservation $request)
    {
        $validated = $request->validated();

        $validated['confirm_number'] = bin2hex(random_bytes(10));
        $validated['pickup'] = implode(" ", $validated['pickup']);
        $validated['dropoff'] = implode(" ", $validated['dropoff']);
        $validated['age'] = implode(" ", $validated['age']);

        Reservation::create($validated);

        return redirect('/')->with('message', 'Reservation booked!');
    }

    public function search(ShowReservation $request) {
        $validated = $request->validated();

        $checkReservation = [
            ['confirm_number', '=', $validated['confirm_number']],
            ['name', '=', $validated['name']],
            ['number', '=', $validated['number']]
        ];
        
        $reservations = Reservation::where($checkReservation)->get();

        
        foreach ($reservations as $reservation) {
            if ($reservation['confirm_number'] == $validated['confirm_number'] && $reservation['name'] == $validated['name'] && $reservation['number'] == $validated['number']) {
                $protections = VehicleProtectionProduct::where('id', 1)
                    ->orWhere('id', 2)
                    ->orWhere('id', 3)->get();

                $equipments = VehicleEquipment::where('id', 1)
                    ->orWhere('id', 2)
                    ->orWhere('id', 3)->get();
                    return view('reservations.show', [
                    'reservation' => $reservation,
                    'protections' => $protections,
                    'equipments' => $equipments
                ]);
            }
        }
        
        return redirect('/reservations/search');
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
