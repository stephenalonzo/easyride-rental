<x-auth-layout>
    <form action="/reservations/search" method="POST" class="mx-auto max-w-7xl">
        @csrf
        <div class="bg-base-100 w-full rounded-lg shadow-base-300/20 shadow-sm">
            <h5 class="bg-base-300/10 rounded-t-lg p-4 text-xl font-bold">View, Modify, or Cancel a Reservation</h5>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="col-span-2">
                    <label class="label-text" for="confirmNumber">Confirmation Number</label>
                    <input type="text" name="confirm_number" placeholder="Enter confirmation number" class="input"
                        id="confirmNumber" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="fullName">Full Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" class="input"
                        id="fullName" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="phoneNumber">Phone Number</label>
                    <input type="tel" name="number" placeholder="Format: 123-456-7890" class="input"
                        id="phoneNumber" required />
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-4">Search</button>
        </div>
    </form>
</x-auth-layout>
