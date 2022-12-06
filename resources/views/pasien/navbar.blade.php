@php
    $cr = Route::current()->action['as'];
@endphp
<div class="navbar  bg-primary">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
        </div>
        <div class=" flex flex-wrap w-1/4  items-center justify-center">
            <img src='{{ url('image/serberus.png') }}' alt="ini image serberus" srcset="" width="60"
                height="60">
        </div>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal p-0">
            <li class="{{ $cr == 'pasien.home' ? 'text-white' : '' }}"><a href="{{ route('pasien.home') }}"
                    class="btn btn-ghost normal-case text-xl">Beranda</a></li>
            <li class="{{ $cr == 'pasien.janji' ? 'text-white' : '' }}"><a href="{{ route('pasien.janji') }}"
                    class="btn btn-ghost normal-case text-xl">Janji Temu</a></li>
            <li class="{{ $cr == 'pasien.obat' ? 'text-white' : '' }}"><a
                    href="{{ route('pasien.obat', ['page' => 1]) }}" class="btn btn-ghost normal-case text-xl">Beli
                    Obat</a></li>
            <li class="{{ $cr == '' ? 'text-white' : '' }}"><a href=""
                    class="btn btn-ghost normal-case text-xl">Konsultasi</a></li>
            <li class="{{ $cr == '' ? 'text-white' : '' }}"><a href=""
                    class="btn btn-ghost normal-case text-xl">Riwayat</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <a class="btn btn-error" href="{{ route('logout') }}">Logout</a>
    </div>
</div>
