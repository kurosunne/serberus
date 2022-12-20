@extends('layout.setup')

@section('header')
    @include('dokter.components.navbar')
@endsection

@section('main')
    <div class="h-full w-full flex justify-center items-start">

        <div class="h-4/5 w-11/12 flex flex-col items-start justify-start mt-10 p-0">
            <div class="h-64 w-full">
                <div class="overflow-x-auto mt-10">
                    <table class="table w-full text-center">
                        <thead class="text-base-100">

                            <tr>
                                <th class="bg-secondary">
                                    <a href="{{ route('dokter.janji', $sort_link['id']) }}">No</a>
                                    @if ($sort_status['sort'] == 'id' && $sort_status['order'] == 'asc')
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                    @if ($sort_status['sort'] == 'id' && $sort_status['order'] == 'desc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @endif
                                </th>
                                <th class="bg-secondary">
                                    <a href="{{ route('dokter.janji', $sort_link['pasien']) }}">Pasien</a>
                                    @if ($sort_status['sort'] == 'pasien' && $sort_status['order'] == 'asc')
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                    @if ($sort_status['sort'] == 'pasien' && $sort_status['order'] == 'desc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @endif
                                </th>
                                <th class="bg-secondary">
                                    <a href="{{ route('dokter.janji', $sort_link['tanggal']) }}">Tanggal Janji</a>
                                    @if ($sort_status['sort'] == 'tanggal' && $sort_status['order'] == 'asc')
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                    @if ($sort_status['sort'] == 'tanggal' && $sort_status['order'] == 'desc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @endif
                                </th class="bg-secondary">
                                <th class="bg-secondary">No Telp Pasien</th>
                                <th class="bg-secondary"><a
                                    href="{{ route('dokter.janji', $sort_link['status']) }}">Status</a>
                                @if ($sort_status['sort'] == 'status' && $sort_status['order'] == 'asc')
                                    <i class="fa-solid fa-arrow-up"></i>
                                @endif
                                @if ($sort_status['sort'] == 'status' && $sort_status['order'] == 'desc')
                                    <i class="fa-solid fa-arrow-down"></i>
                                @endif</th>
                                <th class="bg-secondary">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($janji_temu as $key => $a)
                                <tr>
                                    <td>{{ $sort_status['sort'] == 'id' && $sort_status['order'] == 'desc' ? $janji_temu->count() - $key : $key + 1 }}
                                    </td>
                                    <td>{{ $a->ps_nama }}</td>
                                    <td>{{ date_format(DateTime::createFromFormat('Y-m-d', $a->jt_tanggal), 'd F Y ') }}</td>
                                    <td>{{ $a->ps_telp }}</td>
                                    <td>{{ $a->trashed() ? 'Completed' : 'Active' }}</td>
                                    <td>
                                        <a href="{{ url("dokter/janji/$a->jt_id/delete") }}" class="btn btn-success">Finish</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
