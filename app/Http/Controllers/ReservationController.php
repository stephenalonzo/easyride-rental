<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Vehicle;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\VehicleEquipment;
use App\Mail\ReservationReminder;
use App\Http\Requests\UpdateStatus;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ConfirmPayment;
use App\Http\Requests\GetReservation;
use App\Http\Requests\ShowReservation;
use App\Http\Requests\CloseReservation;
use App\Http\Requests\StoreReservation;
use App\Http\Requests\UpdateReservation;
use App\Mail\ReservationConfirmation;
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
    public function create(GetReservation $request)
    {
        return view('reservations.create', [
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

        $validated['user_id'] = auth()->user()->id;
        $validated['confirm_number'] = bin2hex(random_bytes(10));
        $validated['pickup'] = implode(" ", $validated['pickup']);
        $validated['dropoff'] = implode(" ", $validated['dropoff']);
        $validated['age'] = implode(" ", $validated['age']);

        // Reservation Status | pending(default) = 1; received = 2; expired = 3;
        $validated['status'] = 1;

        Reservation::create($validated);

        Mail::to($validated['email'])->send(new ReservationConfirmation($validated['confirm_number']));

        return redirect('/reservations/'.$validated['confirm_number'])->with([
            'message' => 'Reservation booked',
            'subMessage' => 'You will receive an email with details of your reservation.'
        ]);
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
                return redirect('/reservations/'.$validated['confirm_number']);
            }
        }

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        $protections = VehicleProtectionProduct::where('id', 1)
            ->orWhere('id', 2)
            ->orWhere('id', 3)->get();

        $equipments = VehicleEquipment::where('id', 1)
            ->orWhere('id', 2)
            ->orWhere('id', 3)->get();

        $user = auth()->user();
        
        return view('reservations.show', [
            'reservation' => $reservation,
            'protections' => $protections,
            'equipments' => $equipments,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', [
            'reservation' => $reservation,
            'vehicles' => Vehicle::all(),
            'countries' => Country::all()
        ]);
    }

    public function update(UpdateReservation $request, Reservation $reservation) {
        $validated = $request->validated();

        if (empty($validated['opt_protection'])) {
            $validated['opt_protection'] = null;
        } 
        
        if (empty($validated['equipment'])) {
            $validated['equipment'] = null;
        }

        $reservation->update($validated);

        return redirect('/reservations/'.$reservation->confirm_number)->with([
            'message' => 'Changes saved',
            'subMessage' => 'Your reservation modifications have been saved.'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function confirmPayment(ConfirmPayment $request)
    {
        $validated = $request->validated();

        Reservation::where('id', $validated['reservation'])->update([
            'status' => 2
        ]);

        $reservations = Reservation::where('id', $validated['reservation'])->get();

        foreach ($reservations as $reservation) {
            return redirect('/reservations/'.$reservation['confirm_number'])->with('message', 'Payment confrimed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function closeReservation(CloseReservation $request)
    {
        $validated = $request->validated();

        $reservation = Reservation::find($validated['reservation']);

        $reservation->delete();

        return redirect('/reservations')->with('message', 'Reservation closed');
    }

    public function cancelReservation(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('/reservations')->with([
            'message' => 'Reservation canceled',
            'subMessage' => "We are sorry our partnership ended. If this is a mistake, please reach us at reservations@easyride.com."
        ]);
    }
}
