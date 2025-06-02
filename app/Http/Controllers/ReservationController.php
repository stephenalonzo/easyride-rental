<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowReservation;
use App\Http\Requests\StoreReservation;
use App\Models\Reservation;
use App\Models\Vehicle;
use Hamcrest\Type\IsString;
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
    public function create(Request $request)
    {
        return view('reservations.create', [
            'request' => $request
        ]);
    }

    // Flash Rental Details
    public function details(Request $request) {
        return view('/reservations/create', [
            'request' => $request
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
        $validated['opt_protection'] = isset($validated['opt_protection']) ? implode(", ", $validated['opt_protection']) : null;
        $validated['equipment'] = isset($validated['equipment']) ? implode(", ", $validated['equipment']) : null;

        Reservation::create($validated);

        return redirect('/')->with('message', 'Reservation booked!');
    }

    // Flash Pick-up/Drop-off Location
    public function flush() {
        Session::flush();
        return redirect('/');
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
                return view('reservations.show', [
                    'reservation' => $reservation
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
