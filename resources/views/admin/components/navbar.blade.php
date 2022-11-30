@php
    $cr = Route::current()->action["as"]
@endphp
<div class="navbar  bg-accent">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </label>
      </div>
      <div class=" flex flex-wrap w-1/4  items-center justify-center">
        <img src='{{url('image/serberus.png')}}' alt="ini image serberus" srcset="" width="60" height="60">
      <div class=" text-base text-center text-secondary text-[13px]"> Serberus <br>Sehat Bersama Terus</div>
      </div>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal p-0">
        <li class="{{ $cr == "admin.home" ? 'text-white':''}}"><a href="{{route('admin.home')}}" class="btn btn-ghost normal-case text-xl">Beranda</a></li>
        <li class="{{ $cr == "admin.rumahsakit" ? 'text-white':''}}"><a href="{{route('admin.rumahsakit')}}" class="btn btn-ghost normal-case text-xl">Rumah Sakit</a></li>
        <li class="{{ $cr == "admin.dokter" ? 'text-white':''}}"><a href="{{route('admin.dokter')}}" class="btn btn-ghost normal-case text-xl">Dokter</a></li>
        <li class="{{ $cr == "admin.pasien" ? 'text-white':''}}"><a href="{{route('admin.pasien')}}" class="btn btn-ghost normal-case text-xl">Pasien</a></li>
        <li class="{{ $cr == "admin.perawat" ? 'text-white':''}}"><a href="{{route('admin.perawat')}}" class="btn btn-ghost normal-case text-xl">Perawat</a></li>
        <li class="{{ $cr == "admin.obat" ? 'text-white':''}}"><a href="{{route('admin.obat')}}" class="btn btn-ghost normal-case text-xl">Obat</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a class="btn btn-error" href="{{route('logout')}}">Logout</a>
    </div>
  </div>
