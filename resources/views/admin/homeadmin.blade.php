@extends('layout.setupadmin')

@section('header')
<div class="navbar  bg-neutral">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </label>
      </div>
      <a class="btn btn-ghost normal-case text-xl">Serberus</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal p-0">
        <li><a href="admin/listpasien" class="btn btn-ghost normal-case text-xl">Beranda</a></li>
        <li><a href ="admin/listrumahsakit" class="btn btn-ghost normal-case text-xl">Rumah Sakit</a></li>
        <li><a href="admin/listdokter" class="btn btn-ghost normal-case text-xl">Dokter</a></li>
        <li><a href="admin/listobat" class="btn btn-ghost normal-case text-xl">Obat</a></li>
        <li><a href="admin/riwayat" class="btn btn-ghost normal-case text-xl">Riwayat</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a class="btn btn-error" href="">Logout</a>
    </div>
  </div>
@endsection

@section('main')
<p>Ini adalah halaman admin Serberus</p>
@endsection
