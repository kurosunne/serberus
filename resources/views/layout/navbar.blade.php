@php
    $cr = Route::current()->action['as'];
@endphp

<div class="navbar bg-secondary">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn-ghost btn lg:hidden" id="hamburger-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul class="dropdown-content menu menu-compact p-0 bg-neutral-content">
                @yield('menu-items')
            </ul>
        </div>
        <div class="flex w-1/4 flex-wrap items-center justify-center">
            <img src='{{ url('image/serberus.png') }}' alt="ini image serberus" srcset="" width="60"
                height="60">
        </div>
    </div>
    <div class="navbar-center hidden lg:flex" id="menu-items">
        <ul class="menu menu-horizontal p-0">
            @yield('menu-items')
        </ul>
    </div>
    <div class="navbar-end">
        <a class="btn-error btn" href="{{ route('logout') }}">Logout</a>
    </div>
</div>
