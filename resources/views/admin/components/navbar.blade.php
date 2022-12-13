@extends('layout.navbar')

@section("menu-items")
@php
    $cr = $cr ?? ''
@endphp
  <li class="{{ $cr == "admin.home" ? 'text-white':''}}"><a href="{{route('admin.home')}}" class="btn btn-ghost normal-case text-xl">Beranda</a></li>
  <li class="{{ $cr == "admin.rumahsakit" ? 'text-white':''}}"><a href="{{route('admin.rumahsakit')}}" class="btn btn-ghost normal-case text-xl">Rumah Sakit</a></li>
  <li class="{{ $cr == "admin.dokter" ? 'text-white':''}}"><a href="{{route('admin.dokter')}}" class="btn btn-ghost normal-case text-xl">Dokter</a></li>
  <li class="{{ $cr == "admin.pasien" ? 'text-white':''}}"><a href="{{route('admin.pasien')}}" class="btn btn-ghost normal-case text-xl">Pasien</a></li>
  <li class="{{ $cr == "admin.perawat" ? 'text-white':''}}"><a href="{{route('admin.perawat')}}" class="btn btn-ghost normal-case text-xl">Perawat</a></li>
  <li class="{{ $cr == "admin.obat" ? 'text-white':''}}"><a href="{{route('admin.obat')}}" class="btn btn-ghost normal-case text-xl">Obat</a></li>
@endsection
