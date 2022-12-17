@php
$cr = Route::current()->action['as'];
@endphp
<x-navbar class="navbar bg-secondary">
<li class="{{ $cr == "perawat.janji" ? 'text-white':''}}"><a href="{{route('perawat.janji')}}" class="btn btn-ghost normal-case text-xl">Janji Rawat</a></li>
<li class="{{ $cr == "perawat.riwayat" ? 'text-white':''}}"><a href="{{route('perawat.riwayat')}}" class="btn btn-ghost normal-case text-xl">Riwayat</a></li>
</x-navbar>

