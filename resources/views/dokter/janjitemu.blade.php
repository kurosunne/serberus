@extends('layout.setup')

@section('header')
@include('dokter.components.navbar')
@endsection

@section('main')

    Janji Temu:

        <table class="table">
            <tr>
                <th>
                    <a href="{{route('dokter.janji',$sort_link["id"])}}">No</a>
                    @if($sort_status["sort"] == "id" && $sort_status["order"] == "asc" ) <i class="fa-solid fa-arrow-up"></i> @endif
                    @if($sort_status["sort"] == "id" && $sort_status["order"] == "desc" ) <i class="fa-solid fa-arrow-down"></i> @endif
                </th>
                <th>
                    <a href="{{route('dokter.janji',$sort_link["pasien"])}}">Pasien</a>
                    @if($sort_status["sort"] == "pasien" && $sort_status["order"] == "asc" ) <i class="fa-solid fa-arrow-up"></i> @endif
                    @if($sort_status["sort"] == "pasien" && $sort_status["order"] == "desc" ) <i class="fa-solid fa-arrow-down"></i> @endif
                </th>
                <th>
                    <a href="{{route('dokter.janji',$sort_link["tanggal"])}}">Tanggal Janji</a>
                    @if($sort_status["sort"] == "tanggal" && $sort_status["order"] == "asc" ) <i class="fa-solid fa-arrow-up"></i> @endif
                    @if($sort_status["sort"] == "tanggal" && $sort_status["order"] == "desc" ) <i class="fa-solid fa-arrow-down"></i> @endif
                </th>
                <th>Dibuat pada</th>
                <th>Diubah pada</th>
            </tr>
            @foreach ($janji_temu as $key=>$a)
            <tr>
                <td>{{ ($sort_status["sort"] == "id" && $sort_status["order"] == "desc")? $janji_temu->count() - $key : $key + 1 }}</td>
                <td>{{ $a->ps_nama }}</td>
                <td>{{ date_format(DateTime::createFromFormat("Y-m-d", $a->jt_tanggal),'d F Y ') }}</td>
                <td>{{$a->created_at}}</td>
                <td>{{$a->updated_at}}</td>
            </tr>
            @endforeach
        </table>
@endsection

