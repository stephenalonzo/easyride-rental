<x-auth-layout>
    <form action="/reservations/{{ $reservation->id }}/update" method="POST"
        class="mx-auto max-w-7xl grid grid-cols-4 gap-8">
        @csrf
        @method('PUT')
        <div class="col-span-4 bg-base-100 w-full rounded-lg shadow-base-300/20 shadow-sm">
            <h5 class="bg-base-300/10 rounded-t-lg p-4 text-xl font-bold">Reservation Form</h5>
            <div class="grid grid-cols-3 gap-4 p-4 w-fit">
                <div class="w-96">
                    <label class="label-text" for="pickupTime">Pick-up Time</label>
                    <input type="datetime-local" class="input" id="pickupTime" name="pickup"
                        value="{{ $reservation->pickup }}" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="dropTime">Drop-off Time</label>
                    <input type="datetime-local" class="input" id="dropTime" name="dropoff"
                        value="{{ $reservation->dropoff }}" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="renterAge">Renter's Age</label>
                    <select class="select" id="renterAge" name="age" required>
                        <option selected disabled>Select Age</option>
                        <option value="30+" {{ $reservation->age == '30+' ? 'selected' : '' }}>30+</option>
                        <option value="29" {{ $reservation->age == '29' ? 'selected' : '' }}>29</option>
                        <option value="28" {{ $reservation->age == '28' ? 'selected' : '' }}>28</option>
                        <option value="27" {{ $reservation->age == '27' ? 'selected' : '' }}>27</option>
                        <option value="26" {{ $reservation->age == '26' ? 'selected' : '' }}>26</option>
                        <option value="25" {{ $reservation->age == '25' ? 'selected' : '' }}>25</option>
                    </select>
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">1. Contact Details</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="w-96">
                    <label class="label-text" for="fullName">Full Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" class="input"
                        id="fullName" value="{{ $reservation->name }}" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="phoneNumber">Phone Number</label>
                    <input type="tel" name="number" placeholder="Format: 123-456-7890" class="input"
                        id="phoneNumber" value="{{ $reservation->number }}" required />
                </div>
                <div class="col-span-2">
                    <label class="label-text" for="emailAddress">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email address" class="input"
                        id="emailAddress" value="{{ $reservation->email }}" required />
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">2. Select Vehicle</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="w-96 flex flex-row items-end justify-center space-x-2">
                    <div class="flex flex-col w-full">
                        <label class="label-text" for="carType">Type</label>
                        <select class="select" name="vehicle_id" id="carType" required>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}"
                                    {{ $reservation->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                                    {{ $vehicle->vehicle . ' (' . $vehicle->model_type . ') ' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">3. Optional Protection Products</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="col-span-2 space-y-8">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="opt_protection[]" class="switch switch-primary" value="1"
                            @if (is_array($reservation->opt_protection)) @if (in_array(1, [$reservation->opt_protection]) || in_array(1, $reservation->opt_protection))
                                    {{ 'checked' }}
                                @else
                                    {{ '' }} @endif
                        @else {{ '' }} @endif />
                        <span>Damage Waiver ($18.95/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>
                                                Collision Damage Waiver (CDW) is not insurance. The purchase of CDW is
                                                optional for Economy to Full size and mandatory for Premium and above.
                                                You may purchase CDW for an additional fee. If you purchase CDW, we
                                                agree, subject to the actions listed on the rental agreement that
                                                invalidate CDW, to contractually waive your responsibility for all or
                                                part of the cost of damage to, or loss of the vehicle. A deductible of
                                                $1000 USD applies. If CDW is declined, renter is responsible for the
                                                full value of damage to the vehicle.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="opt_protection[]" class="switch switch-primary" value="2"
                            @if (is_array($reservation->opt_protection)) @if (in_array(2, [$reservation->opt_protection]) || in_array(2, $reservation->opt_protection))
                                    {{ 'checked' }}
                                @else
                                    {{ '' }} @endif
                        @else {{ '' }} @endif />
                        <span>Personal Accident Insurance ($10.95/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>The purchase of Personal Accident Insurance is optional and not required
                                                to rent a vehicle.</li>
                                            <li>
                                                Personal Accident Insurance covers ambulance service, doctors,
                                                hospitalization and nurses for each passenger in the vehicle, with a
                                                maximum limit of $6,900 USD (200,00 DOP) for each passenger in the
                                                vehicle including the driver, up to maximum passenger allowed in the
                                                vehicle. Coverage also includes Accidental Death coverage of $17,250 USD
                                                (500,00 DOP).
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="opt_protection[]" class="switch switch-primary" value="3"
                            @if (is_array($reservation->opt_protection)) @if (in_array(3, [$reservation->opt_protection]) || in_array(3, $reservation->opt_protection))
                                    {{ 'checked' }}
                                @else
                                    {{ '' }} @endif
                        @else {{ '' }} @endif />
                        <span>Zero Deductible Coverage ($26.95/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>Zero Deductible Coverage is not insurance. The purchase of ZDC is
                                                optional for the customer.</li>
                                            <li>
                                                The customer may purchase ZDC for an additional fee. If you purchase
                                                ZDC, we agree, subject to the actions listed on the rental agreement
                                                that invalidate the ZDC, to contractually waiver your responsibility for
                                                all costs of damage that may occur to the rental vehicle.
                                            </li>
                                            <li>
                                                When purchased with Collision Damage Waiver or Third Party Liability,
                                                this coverage reduces the customer's deductible to 0.00 USD.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">4. Equipment</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="col-span-2 space-y-8">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="equipment[]" class="switch switch-primary" value="1"
                            @if (is_array($reservation->equipment)) @if (in_array(1, [$reservation->equipment]) || in_array(1, $reservation->equipment))
                                    {{ 'checked' }}
                                @else
                                    {{ '' }} @endif
                        @else {{ '' }} @endif />
                        <span>Baby Seat ($6.00/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>
                                                Our baby seats conform to government standards. These baby seats are for
                                                newborn babies up to 13kg/28lbs (0 - 15 months). They are compatible
                                                with a 3-point seat belt, belt base or Isofix base.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="equipment[]" class="switch switch-primary" value="2"
                            @if (is_array($reservation->equipment)) @if (in_array(2, [$reservation->equipment]) || in_array(2, $reservation->equipment))
                                    {{ 'checked' }}
                                @else
                                    {{ '' }} @endif
                        @else {{ '' }} @endif />
                        <span>Child/Toddler Seat ($6.00/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>Our child seats conform to government standards. These child seats are
                                                for children between 9kg/20lbs to 18kg/40lbs (9 months to 4 years). They
                                                are compatible with a 3-point seat belt, belt base, or Isofix base with
                                                a multi-position reclination.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="equipment[]" class="switch switch-primary" value="3"
                            @if (is_array($reservation->equipment)) @if (in_array(3, [$reservation->equipment]) || in_array(3, $reservation->equipment))
                                    {{ 'checked' }}
                                @else
                                    {{ '' }} @endif
                        @else {{ '' }} @endif />
                        <span>Booster Seat ($6.00/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>Our booster seats conform to government standards. These booster seats
                                                are highly versatile for children ranging from 15kg/33lbs to 36kg/80lbs
                                                (4 - 12 years). They are compatible with a 3-point seat belt, belt base,
                                                or Isofix base.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-4">Complete Booking</button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            populateCountries("country", "state");

            $countryElement = $('#country');
            $stateElement = $('#state');

            $countryElement.val('USA').trigger('change');
            $stateElement.val('Florida');

        });
    </script>

    <script type="text/javascript"
        src="https://www.cssscript.com/demo/generic-country-state-dropdown-list-countries-js/countries.js"></script>
</x-auth-layout>
