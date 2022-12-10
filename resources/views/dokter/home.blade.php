@extends('layout.setup')

@section('header')
@include('dokter.components.navbar')
@endsection

@section('main')
Janji Temu:
@foreach ($janji_temu as $a)
    <table class="table">
        <tr>
            <th>je_id</th>
            <th>ps_id</th>
            <th>dk_id</th>
            <th>jt_tanggal</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
        <tr>
            <td>{{ $a->je_id }}</td>
            <td>{{ $a->ps_id }}</td>
            <td>{{ $a->dk_id }}</td>
            <td>{{ $a->jt_tanggal }}</td>
            <td>{{ $a->created_at }}</td>
            <td>{{ $a->updated_at }}</td>
        </tr>
    </table>
@endforeach
Konsultasi:
@foreach ($konsultasi as $a)
    <table class="table">
        <tr>
            <td>ks_id</td>
            <td>dk_id</td>
            <td>ps_id</td>
            <td>created_at</td>
            <td>updated_at</td>
        </tr>
        <tr>
            <td> {{ $a->ks_id}} </td>
            <td> {{ $a->dk_id}} </td>
            <td> {{ $a->ps_id}} </td>
            <td> {{ $a->created_at}} </td>
            <td> {{ $a->updated_at}} </td>
        </tr>
    </table>
@endforeach
@endsection
