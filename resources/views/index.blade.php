<x-layout>
    <div class="flex h-full flex-col space-y-16 overflow-x-hidden pt-40 md:pt-45 lg:pt-16">
        <div
            class="mx-auto flex max-w-7xl flex-col items-center gap-8 justify-self-center px-4 text-center sm:px-6 lg:px-8">
            <h1
                class="text-base-content relative z-1 text-5xl leading-[1.15] font-bold max-md:text-2xl md:max-w-3xl md:text-balance">
                <span>Drive with ease and confidence—affordable, reliable car rentals made simple with EasyRide. Book
                    your ride today!</span>
                <svg width="223" height="12" viewBox="0 0 223 12" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="absolute -bottom-1.5 left-10 -z-1 max-lg:left-4 max-md:hidden">
                    <path
                        d="M1.30466 10.7431C39.971 5.28788 76.0949 3.02 115.082 2.30401C143.893 1.77489 175.871 0.628649 204.399 3.63102C210.113 3.92052 215.332 4.91391 221.722 6.06058"
                        stroke="url(#paint0_linear_10365_68643)" stroke-width="2" stroke-linecap="round" />
                    <defs>
                        <linearGradient id="paint0_linear_10365_68643" x1="19.0416" y1="4.03539" x2="42.8362"
                            y2="66.9459" gradientUnits="userSpaceOnUse">
                            <stop offset="0.2" stop-color="var(--color-primary)" />
                            <stop offset="1" stop-color="var(--color-primary-content)" />
                        </linearGradient>
                    </defs>
                </svg>
            </h1>
            <p class="text-base-content/80 max-w-3xl">
                We offer hassle-free, affordable car rentals with a diverse fleet, flexible options, and 24/7
                customer support, ensuring your journey is smooth and stress-free.
            </p>
        </div>
        <div class="flex items-center justify-center">
            <form action="/reservations/details" method="post"
                class="max-w-2/3 flex flex-row items-end justify-center space-x-4">
                @csrf
                <div class="w-96">
                    <label class="label-text" for="pickupTime">Pick-up Time</label>
                    <input type="datetime-local" class="input" id="pickupTime" name="pickup" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="dropTime">Drop-off Time</label>
                    <input type="datetime-local" class="input" id="dropTie" name="dropoff" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="renterAge">Renter's Age</label>
                    <select class="select" id="renterAge" name="age" required>
                        <option selected disabled value>Select Age</option>
                        <option value="30+">30+</option>
                        <option value="29">29</option>
                        <option value="28">28</option>
                        <option value="27">27</option>
                        <option value="26">26</option>
                        <option value="25">25</option>
                    </select>
                    @error('age')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Reserve Vehicle</button>
            </form>
        </div>
        <div class="mx-auto max-w-7xl">
            <div id="draggable"
                data-carousel='{ "loadingClasses": "opacity-0","dotsItemClasses": "carousel-dot carousel-active:bg-primary", "slidesQty": { "xs": 1, "lg": 3 }, "isDraggable": true }'
                class="relative w-full">
                <div class="carousel h-80 flex overflow-y-auto snap-x snap-mandatory overflow-x-auto">
                    <div class="carousel-body h-full gap-2 opacity-0">
                        <div class="carousel-slide snap-center">
                            <a href="/vehicles/1"
                                class="flex h-full flex-col justify-center items-center p-6 space-y-4">
                                <img class="self-center" src="{{ asset('images/truck-ford-f150.avif') }}"
                                    alt="">
                                <span class="self-center text-lg font-medium">Pick-up Truck</span>
                            </a>
                        </div>
                        <div class="carousel-slide snap-center">
                            <a href="/vehicles/2"
                                class="flex h-full flex-col justify-center items-center p-6 space-y-4">
                                <img class="self-center" src="{{ asset('images/compact-nissan-versa.avif') }}"
                                    alt="">
                                <span class="self-center text-lg font-medium">Compact Car</span>
                            </a>
                        </div>
                        <div class="carousel-slide snap-center">
                            <a href="/vehicles/3"
                                class="flex h-full flex-col justify-center items-center p-6 space-y-4">
                                <img class="self-center" src="{{ asset('images/luxury-cadi-xts.avif') }}"
                                    alt="">
                                <span class="self-center text-lg font-medium">Luxury Car</span>
                            </a>
                        </div>
                        <div class="carousel-slide snap-center">
                            <a href="/vehicles/4"
                                class="flex h-full flex-col justify-center items-center p-6 space-y-4">
                                <img class="self-center" src="{{ asset('images/suv-santa-fe.avif') }}" alt="">
                                <span class="self-center text-lg font-medium">Standard SUV</span>
                            </a>
                        </div>
                        <div class="carousel-slide snap-center">
                            <a href="/vehicles/5"
                                class="flex h-full flex-col justify-center items-center p-6 space-y-4">
                                <img class="self-center" src="{{ asset('images/van-chrysler-pacifica.avif') }}"
                                    alt="">
                                <span class="self-center text-lg font-medium">Mini Van</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Previous Slide -->
                <button type="button"
                    class="carousel-prev start-5 max-sm:start-3 carousel-disabled:opacity-50 size-9.5 bg-base-100 flex items-center justify-center rounded-full shadow-base-300/20 shadow-sm">
                    <span class="icon-[tabler--chevron-left] size-5 cursor-pointer"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <!-- Next Slide -->
                <button type="button"
                    class="carousel-next end-5 max-sm:end-3 carousel-disabled:opacity-50 size-9.5 bg-base-100 flex items-center justify-center rounded-full shadow-base-300/20 shadow-sm">
                    <span class="icon-[tabler--chevron-right] size-5"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>
</x-layout>
