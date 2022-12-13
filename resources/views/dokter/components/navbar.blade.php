@extends('layout.navbar')

@section("menu-items")
@php
    $cr = $cr ?? ''
@endphp
<li class="{{ $cr == 'dokter.home' ? 'text-white' : '' }}"><a href="{{ route('dokter.home') }}"
    class="btn-ghost btn text-xl normal-case">Beranda</a></li>
<li class="{{ $cr == 'dokter.janji' ? 'text-white' : '' }}"><a href="{{ route('dokter.janji') }}"
    class="btn-ghost btn text-xl normal-case">Janji Temu</a></li>
<li class="{{ $cr == 'dokter.konsultasi' ? 'text-white' : '' }}"><a
    href="{{ route('dokter.konsultasi') }}" class="btn-ghost btn text-xl normal-case">Konsultasi</a>
</li>
<li class="{{ $cr == 'dokter.riwayat' ? 'text-white' : '' }}"><a href="{{ route('dokter.riwayat') }}"
    class="btn-ghost btn text-xl normal-case">Riwayat</a></li>
@endsection
