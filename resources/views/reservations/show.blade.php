<x-layout>
    <div class="mx-auto max-w-7xl">
        <div class="w-full p-4">
            <div class="px-4 sm:px-0">
                <h3 class="text-2xl font-semibold text-base-content">Reservation Details</h3>
                <p class="mt-1 max-w-full text-base-content/80">Confirmation Number: {{ $reservation->confirm_number }}
                </p>
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
                        <dd class="mt-1  text-base-content/80 sm:col-span-2 sm:mt-0">
                            {{ $reservation->email }}</dd>
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
                                        @foreach ($protections as $protection)
                                            <li>{{ $protection->title . ' ' . '(' . $protection->price . '/Day)' }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="w-full">
                                    <span class="font-medium">Equipment</span>
                                    <ul class="list-disc list-inside">
                                        @foreach ($equipments as $equipment)
                                            <li>{{ $equipment->title . ' ' . '(' . $equipment->price . '/Day)' }}</li>
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
