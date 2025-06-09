<x-auth-layout>
    <div class="mx-auto max-w-7xl">
        @csrf
        @if (url()->previous() != url()->current())
            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        @endif
        <div class="w-full p-4">
            <div class="px-4 sm:px-0">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold text-base-content">Reservation Details</h3>
                        <p class="mt-1 max-w-full text-base-content/80">Confirmation Number:
                            {{ $reservation->confirm_number }}
                        </p>
                    </div>
                    @role('user')
                        @if ($reservation->users->id == auth()->user()->id)
                            @switch($reservation->status)
                                @case(1)
                                    <div class="flex items-center space-x-2">
                                        <a href="/reservations/{{ $reservation->id }}/edit" class="btn btn-accent">Modify</a>
                                        <form action="/reservations/{{ $reservation->id }}/delete" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning"
                                                onclick="return confirm('Are you sure you want to cancel this reservation? Press OK to continue.')">Cancel</button>
                                        </form>
                                    </div>
                                @break

                                @default
                            @endswitch
                        @endif
                    @else
                    @endrole
                    @role('admin')
                        @switch($reservation->status)
                            @case(2)
                                <form action="/reservations/delete" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="no-focus hidden" type="text" name="reservation" value="{{ $reservation->id }}"
                                        readonly>
                                    <button type="submit" class="btn btn-error">Close Reservation</button>
                                </form>
                            @break

                            @case(3)
                                <form action="/reservations/delete" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input class="no-focus hidden" type="text" name="reservation" value="{{ $reservation->id }}"
                                        readonly>
                                    <button type="submit" class="btn btn-error">Close Reservation</button>
                                </form>
                            @break

                            @default
                                <form action="/reservations/update" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input class="no-focus hidden" type="text" name="reservation" value="{{ $reservation->id }}"
                                        readonly>
                                    <button type="submit" class="btn btn-success">Confirm Payment</button>
                                </form>
                        @endswitch
                    @else
                    @endrole
                </div>
                @switch($reservation->status)
                    @case(2)
                        <div class="flex items-center space-x-3">
                            <p class="mt-1 max-w-full text-base-content/80">Status:</p>
                            <span class="badge badge-soft badge-success">Payment Received</span>
                        </div>
                    @break

                    @case(3)
                        <div class="flex items-center space-x-3">
                            <p class="mt-1 max-w-full text-base-content/80">Status:</p>
                            <span class="badge badge-soft badge-error">Expired</span>
                        </div>
                    @break

                    @default
                        <div class="flex items-center space-x-3">
                            <p class="mt-1 max-w-full text-base-content/80">Status:</p>
                            <span class="badge badge-soft badge-warning">Pending</span>
                        </div>
                @endswitch
            </div>
            <div class="mt-6 border-t border-base-content/25">
                <dl class="divide-y divide-base-content/25">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 text-base">
                        <dt class="font-medium text-base-content">Renter's Name & Age</dt>
                        <dd class="mt-1  text-base-content/80 sm:col-span-2 sm:mt-0">
                            {{ $reservation->name . ', ' . $reservation->age . ' years old' }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 text-base">
                        <dt class="font-medium text-base-content">Renter's Email Address</dt>
                        <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">
                            <form form action="/reservations/reminder" method="post"
                                class="flex items-center space-x-4">
                                @csrf
                                <input class="no-focus" type="email" name="email" value="{{ $reservation->email }}"
                                    readonly>
                                <input class="hidden" type="text" name="confirm_number"
                                    value="{{ $reservation->confirm_number }}" readonly>
                                @switch($reservation->status)
                                    @case(2)
                                    @break

                                    @case(3)
                                    @break

                                    @default
                                        @role('admin')
                                            <button type="submit" class="btn btn-accent">
                                                <i class="fa-solid fa-bell"></i>
                                                <span>Send Reminder</span>
                                            </button>
                                        @else
                                        @endrole
                                @endswitch
                            </form>
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 text-base">
                        <dt class="font-medium text-base-content">Reserved Vehicle</dt>
                        <dd class="mt-1 text-base-content/80 sm:col-span-2 sm:mt-0">
                            @switch($reservation->vehicle_id)
                                @case(1)
                                    {{ 'Pick-up Truck (Toyota Tacoma or similar)' }}
                                @break

                                @case(2)
                                    {{ 'Compact Car (Nissan Sentra or similar)' }}
                                @break

                                @case(3)
                                    {{ 'Luxury Car (BM7 Series or similar)' }}
                                @break

                                @case(4)
                                    {{ 'Standard SUV (Mitsubishi Outlander or similar)' }}
                                @break

                                @case(5)
                                    {{ 'Mini Van (Toyota Sienna or similar)' }}
                                @break

                                @default
                            @endswitch
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 text-base">
                        <dt class="font-medium text-base-content">Pick-up Time</dt>
                        <dd class="mt-1  text-base-content/80 sm:col-span-2 sm:mt-0">
                            {{ date('D, M d, Y @ H:i A', strtotime($reservation->pickup)) }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 text-base">
                        <dt class="font-medium text-base-content">Drop-off Time</dt>
                        <dd class="mt-1  text-base-content/80 sm:col-span-2 sm:mt-0">
                            {{ date('D, M d, Y @ H:i A', strtotime($reservation->dropoff)) }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 text-base">
                        <dt class="font-medium text-base-content">Pick-up Location</dt>
                        <dd class="mt-1  text-base-content/80 sm:col-span-2 sm:mt-0">1234 Some St <br> San Francisco,
                            CA 67890</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 text-base">
                        <dt class="font-medium text-base-content">Add-ons</dt>
                        <dd class="mt-1  text-base-content/80 sm:col-span-2 sm:mt-0">
                            {{-- Loop through array from opt_protection/equipment --}}
                            <div class="space-y-4">
                                <div class="w-full">
                                    <span class="font-medium">Optional Protection Products</span>
                                    <ul class="list-disc list-inside">
                                        @if (is_array($reservation->opt_protection) || is_object($reservation->opt_protection))
                                            @foreach ($reservation->opt_protection as $protection)
                                                @switch($protection)
                                                    @case(1)
                                                        <li>{{ 'Damage Waiver ($18.95/Day)' }}</li>
                                                    @break

                                                    @case(2)
                                                        <li>{{ 'Personal Accident Insurance ($10.95/Day)' }}</li>
                                                    @break

                                                    @case(3)
                                                        <li>{{ 'Zero Deductible Coverage ($26.95/Day)' }}</li>
                                                    @break

                                                    @default
                                                @endswitch
                                            @endforeach
                                        @else
                                            <li>N/A</li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="w-full">
                                    <span class="font-medium">Equipment</span>
                                    <ul class="list-disc list-inside">
                                        @if (is_array($reservation->equipment) || is_object($reservation->equipment))
                                            @foreach ($reservation->equipment as $equipment)
                                                @switch($equipment)
                                                    @case(1)
                                                        <li>{{ 'Baby Seat ($6.00/Day)' }}</li>
                                                    @break

                                                    @case(2)
                                                        <li>{{ 'Child/Toddler Seat ($6.00/Day' }}</li>
                                                    @break

                                                    @case(3)
                                                        <li>{{ 'Booster Seat ($6.00/Day' }}</li>
                                                    @break

                                                    @case('NULL')
                                                        <li>{{ 'Booster Seat ($6.00/Day' }}</li>
                                                    @break

                                                    @default
                                                @endswitch
                                            @endforeach
                                        @else
                                            <li>N/A</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-auth-layout>
