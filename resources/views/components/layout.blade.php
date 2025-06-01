<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyRide Rental</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="grid grid-rows-1 min-h-[100vh]">
    <div class="bg-base-100">
        <header class=" bg-base-100 mx-auto flex max-w-7xl flex-wrap text-sm md:flex-nowrap md:justify-start">
            <nav class="mx-auto w-full p-4" aria-label="Global">
                <div class="relative md:flex md:items-center">
                    <div class="flex items-center justify-between">
                        <a class="link link-primary text-4xl font-bold no-underline grand-hotel-regular" href="/">
                            EasyRide
                        </a>
                        <div class="md:hidden">
                            <button type="button"
                                class="collapse-toggle btn btn-outline btn-secondary btn-sm btn-square"
                                data-collapse="#navbar-mega-menu-click" aria-controls="navbar-mega-menu-click"
                                aria-label="Toggle navigation">
                                <span class="icon-[tabler--menu-2] collapse-open:hidden size-4"></span>
                                <span class="icon-[tabler--x] collapse-open:block hidden size-4"></span>
                            </button>
                        </div>
                    </div>
                    <div id="navbar-mega-menu-click"
                        class="collapse hidden grow basis-full overflow-hidden rounded-lg transition-all duration-300 md:block">
                        <div
                            class="flex flex-col rounded-lg max-md:mt-3 max-md:border max-md:py-2 md:flex-row md:items-center md:justify-start md:ps-5 md:pe-0.5 gap-2 max-md:border-base-content/20">
                            <div
                                class="dropdown [--adaptive:none] [--auto-close:inside] [--strategy:static] md:[--strategy:absolute]">
                                <button type="button"
                                    class="dropdown-toggle btn btn-text text-base-content/80 dropdown-open:bg-base-content/10 dropdown-open:text-base-content max-md:px-3"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                    Reservations
                                    <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                                </button>
                                <div class="dropdown-menu dropdown-open:opacity-100 start-0 top-12 hidden w-full min-w-60 rounded-lg py-2 opacity-0 transition-[opacity,margin] duration-[0.1ms] before:absolute max-md:border max-md:shadow-none max-md:border-base-content/20"
                                    role="menu" aria-orientation="vertical">
                                    <ul class="menu md:menu-horizontal rounded-box w-full max-xl:gap-4 p-0">
                                        <li>
                                            <span class="menu-title font-bold">Car Rental</span>
                                            <ul class="menu">
                                                <li><a href="/reservations/create">Start a Car Reservation</a></li>
                                                <li><a href="/reservations/search">View, Modify, or Cancel</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div
                                class="dropdown [--adaptive:none] [--auto-close:inside] [--strategy:static] md:[--strategy:absolute]">
                                <button type="button"
                                    class="dropdown-toggle btn btn-text text-base-content/80 dropdown-open:bg-base-content/10 dropdown-open:text-base-content max-md:px-3"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                    Vehicles
                                    <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                                </button>
                                <div class="dropdown-menu dropdown-open:opacity-100 start-0 top-12 hidden w-full min-w-60 rounded-lg py-2 opacity-0 transition-[opacity,margin] duration-[0.1ms] before:absolute max-md:border max-md:shadow-none max-md:border-base-content/20"
                                    role="menu" aria-orientation="vertical">
                                    <ul class="menu md:menu-horizontal rounded-box w-full max-xl:gap-4 p-0">
                                        <li>
                                            <a href="#" class="menu-title font-bold">Vehicles for Rent</a>
                                            <ul class="menu">
                                                <li><a href="#">Cars, SUVs, Trucks & Vans</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-end items-center gap-4">
                        <p class="text-sm">Don't have an account? <span class="text-primary"><a
                                    href="#">Register!</a></span></p>
                        <a class="btn max-md:btn-square btn-primary" href="#">
                            <span class="max-md:hidden">Login</span>
                        </a>
                    </div>
                    {{-- Avatar --}}
                    {{-- <div
                        class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">
                        <button id="dropdown-scrollable" type="button" class="dropdown-toggle flex items-center"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <div class="avatar">
                                <div class="size-9.5 rounded-full">
                                    <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png" alt="avatar 1" />
                                </div>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu"
                            aria-orientation="vertical" aria-labelledby="dropdown-avatar">
                            <li class="dropdown-header gap-2">
                                <div class="avatar">
                                    <div class="w-10 rounded-full">
                                        <img src="https://cdn.flyonui.com/fy-assets/avatar/avatar-1.png"
                                            alt="avatar" />
                                    </div>
                                </div>
                                <div>
                                    <h6 class="text-base-content text-base font-semibold">John Doe</h6>
                                    <small class="text-base-content/50">Admin</small>
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="icon-[tabler--user]"></span>
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="icon-[tabler--settings]"></span>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="icon-[tabler--receipt-rupee]"></span>
                                    Billing
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="icon-[tabler--help-triangle]"></span>
                                    FAQs
                                </a>
                            </li>
                            <li class="dropdown-footer gap-2">
                                <a class="btn btn-error btn-soft btn-block" href="#">
                                    <span class="icon-[tabler--logout]"></span>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </nav>
        </header>
        <main class="py-8 flex-[1]">
            {{ $slot }}
        </main>
    </div>
    <div class="bg-base-200/60">
        <div class="mx-auto max-w-7xl">
            <footer class="footer items-center px-6 py-4">
                <aside class="grid-flow-col items-center">
                    <p>©2025 <a class="link link-hover font-medium" href="#">EasyRide Rental</a></p>
                </aside>
                <nav class="text-base-content grid-flow-col gap-4 md:place-self-center md:justify-self-end">
                    <a class="link link-hover" href="#">License</a>
                    <a class="link link-hover" href="#">Help</a>
                    <a class="link link-hover" href="#">Contact</a>
                    <a class="link link-hover" href="#">Policy</a>
                </nav>
            </footer>
        </div>
    </div>
</body>

</html>
