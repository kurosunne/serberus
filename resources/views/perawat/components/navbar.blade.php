@extends('layout.navbar')

@section("menu-items")
@php
    $cr = Route::current()->action['as'];
@endphp
<li class="{{ $cr == "perawat.home" ? 'text-white':''}}"><a href="{{route('perawat.home')}}" class="btn btn-ghost normal-case text-xl">Beranda</a></li>
<li class="{{ $cr == "perawat.janji" ? 'text-white':''}}"><a href="{{route('perawat.janji')}}" class="btn btn-ghost normal-case text-xl">Janji Rawat</a></li>
<li class="{{ $cr == "perawat.konsultasi" ? 'text-white':''}}"><a href="{{route('perawat.konsultasi')}}" class="btn btn-ghost normal-case text-xl">Konsultasi</a></li>
<li class="{{ $cr == "perawat.riwayat" ? 'text-white':''}}"><a href="{{route('perawat.riwayat')}}" class="btn btn-ghost normal-case text-xl">Riwayat</a></li>

@endsection
