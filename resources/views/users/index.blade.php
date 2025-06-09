<x-guest-layout>
    <form action="/login/auth" method="POST" class="mx-auto w-1/4 flex flex-col items-center space-y-5">
        @csrf
        <a class="link link-primary text-4xl font-bold no-underline grand-hotel-regular" href="/">
            EasyRide
        </a>
        <div class="bg-base-100 w-full rounded-lg shadow-base-300/20 shadow-sm">
            <h5 class="bg-base-300/10 rounded-t-lg p-4 text-xl font-bold">Login</h5>
            <div class="grid grid-flow-row items-center justify-center">
                <div class="w-96 p-4">
                    <label class="label-text" for="emailAddress">Email Address</label>
                    <input type="email" placeholder="" name="email" class="input" id="emailAddress" />
                </div>
                <div class="w-96 p-4">
                    <label class="label-text" for="password">Password</label>
                    <input type="password" placeholder="" name="password" class="input" id="password" />
                </div>
                <div class="w-full flex items-center justify-between space-x-2 p-4">
                    <p class="text-sm">Don't have an account? <span class="text-primary"><a
                                href="/register">Register!</a></span></p>
                    <button type="submit" class="btn btn-primary w-24">Login</button>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
