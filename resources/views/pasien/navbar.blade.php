@php
    $cr = Route::current()->action["as"]
@endphp
<div class="h-20 w-full flex flex-row bg-primary    ">
    <div class="W-1/5 flex flex-col space-y-0 justify-start navbar bg-primary">
        <img src='{{ url('image/serberus.png') }}' alt="ini image serberus" srcset="" class="h-7 w-7">
        <p class="text-xs font-bold text-sky-600">Serberus</p>
        <p class="text-xs text-sky-600">Sehat Bersama Terus</p>
    </div>
    <div class="navbar-center hidden lg:flex w-3/5 items-center justify-center">
        <ul class="menu menu-horizontal p-0">
            <li class="{{ $cr == "pasien.home" ? 'text-white':''}}"><a href="{{route('pasien.home')}}" class="btn btn-ghost normal-case text-xl">Beranda</a></li>
            <li class="{{ $cr == "pasien.janji" ? 'text-white':''}}"><a href="{{route('pasien.janji')}}" class="btn btn-ghost normal-case text-xl">Janji Temu</a></li>
            <li class="{{ $cr == "pasien.obat" ? 'text-white':''}}"><a href="{{route('pasien.obat')}}" class="btn btn-ghost normal-case text-xl">Janji Temu</a></li>
            <li class="{{ $cr == "" ? 'text-white':''}}"><a href="" class="btn btn-ghost normal-case text-xl">Konsultasi</a></li>
            <li class="{{ $cr == "" ? 'text-white':''}}"><a href="" class="btn btn-ghost normal-case text-xl">Riwayat</a></li>
        </ul>
    </div>
    <div class="navbar-end w-1/5 h-3/5 flex flex-end mt-4 mr-6">
        <div class="avatar">
            <div class="rounded-full w-12    mr-5">
                <img src='{{ url('image/avatar.jpg') }}' alt="ini image avatar" srcset="" class="h-24 w-24">
            </div>
        </div>
        <a class="btn btn-outline bg-accent w-20 h-5 p-0">Logout</a>
    </div>
</div>
