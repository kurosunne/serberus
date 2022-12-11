@extends('layout.setup')

@section('header')
@include('dokter.components.navbar')
@endsection

@section('main')
Janji Temu:

    <table class="table">
        <tr>
            <th>je_id</th>
            <th>ps_id</th>
            <th>dk_id</th>
            <th>jt_tanggal</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
        @foreach ($janji_temu as $a)
        <tr>
            <td>{{ $a->je_id }}</td>
            <td>{{ $a->ps_id }}</td>
            <td>{{ $a->dk_id }}</td>
            <td>{{ $a->jt_tanggal }}</td>
            <td>{{ $a->created_at }}</td>
            <td>{{ $a->updated_at }}</td>
        </tr>
        @endforeach
    </table>
Konsultasi:
    <table class="table">
        <tr>
            <th>ks_id</th>
            <th>dk_id</th>
            <th>ps_id</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
        @foreach ($konsultasi as $a)
        <tr>
            <td> {{ $a->ks_id}} </td>
            <td> {{ $a->dk_id}} </td>
            <td> {{ $a->ps_id}} </td>
            <td> {{ $a->created_at}} </td>
            <td> {{ $a->updated_at}} </td>
        </tr>
        @endforeach
    </table>
@endsection
