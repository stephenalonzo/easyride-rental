<x-layout>
    <div class="mx-auto max-w-7xl">
        @csrf
        <div class="w-full p-4">
            <div class="px-4 sm:px-0">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold text-base-content">Reservation Details</h3>
                        <p class="mt-1 max-w-full text-base-content/80">Confirmation Number:
                            {{ $reservation->confirm_number }}
                        </p>
                    </div>
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
                            <form action="/reservation/delete" method="post">
                                @csrf
                                <button type="submit" class="btn btn-error">Close Reservation</button>
                            </form>
                        @break

                        @default
                    @endswitch
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
                            <span class="badge badge-soft badge-success">Pending</span>
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
                                @switch($reservation->status)
                                    @case(2)
                                    @break

                                    @case(3)
                                    @break

                                    @default
                                        <button type="submit" class="btn btn-accent">
                                            <i class="fa-solid fa-bell"></i>
                                            <span>Send Reminder</span>
                                        </button>
                                @endswitch
                            </form>
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
                                                    <li>{{ 'N/A' }}</li>
                                            @endswitch
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="w-full">
                                    <span class="font-medium">Equipment</span>
                                    <ul class="list-disc list-inside">
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

                                                @default
                                                    <li>{{ 'N/A' }}</li>
                                            @endswitch
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-layout>
