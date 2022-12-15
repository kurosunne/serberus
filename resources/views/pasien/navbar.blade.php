@php
$cr = Route::current()->action['as'];
@endphp
<x-navbar class="navbar bg-primary">
    <li class="{{ $cr == 'pasien.home' ? 'text-white' : '' }}"><a href="{{ route('pasien.home') }}"
        class="btn btn-ghost normal-case text-xl">Beranda</a></li>
    <li class="{{ $cr == 'pasien.janji' || $cr == 'pasien.janjiperawat' ? 'text-white' : '' }}"><a href="{{ route('pasien.janji') }}"
        class="btn btn-ghost normal-case text-xl">Janji Temu</a></li>
    <li class="{{ $cr == 'pasien.obat' || $cr == 'pasien.detailobat'  ? 'text-white' : '' }}"><a
        href="{{ route('pasien.obat', ['page' => 1]) }}" class="btn btn-ghost normal-case text-xl">Beli
        Obat</a></li>
    <li class="{{ $cr == '' ? 'text-white' : '' }}"><a href=""
        class="btn btn-ghost normal-case text-xl">Konsultasi</a></li>
    <li class="{{ $cr == 'pasien.historitemu' || $cr =='pasien.historiperawat' ||$cr == 'pasien.historiobat'  ? 'text-white' : '' }}"><a href="{{ route('pasien.historitemu') }}"
        class="btn btn-ghost normal-case text-xl">Riwayat</a></li>
        <li class="{{ $cr == 'pasien.keranjang' ? 'text-white' : '' }}"><a href="{{ route('pasien.keranjang') }}"
            class="btn btn-ghost normal-case text-xl">Keranjang</a></li>
</x-navbar>

