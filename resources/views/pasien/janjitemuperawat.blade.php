@extends('layout.setup')

@section('main')
    <div class="h-full w-full flex justify-center items-start">
        @extends('pasien.navbar')
        <div class="h-4/5 w-11/12 flex flex-col items-start justify-start mt-10 p-0">
            <div class="h-10 w-full m-0 flex flex-row m-0">
                <div class="h-full w-4/12 flex flex-col justify-center mr-9">
                </div>
                <div class="h-full w-6/12 flex flex-col justify-center">
                    <div class="w-full h-full flex items-center justify-center">
                        <a href="{{ route('pasien.janji') }}">
                            <div class="btn btn-primary ml-10 mr-3">Janji Temu</div>
                        </a>
                        <a href="{{ route('pasien.janjiperawat') }}">
                            <div class=" text-black btn btn-secondary ml-3">
                                <p class="text-white"> Janji Rawat</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="h-full w-5/12 flex flex-row items-center justify-end">
                </div>
            </div>
            <div class="h-64 w-full">
                <div class="overflow-x-auto mt-10">
                    <table class="table w-full text-center">
                        <!-- head -->
                        <thead class="text-base-100">
                            <tr>
                                <th class="bg-secondary"><a
                                        href="{{ route('pasien.janjiperawat', $sort_link['id']) }}">No</a>
                                    @if ($sort_status['sort'] == 'id' && $sort_status['order'] == 'asc')
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                    @if ($sort_status['sort'] == 'id' && $sort_status['order'] == 'desc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @endif
                                </th>
                                <th class="bg-secondary"> <a
                                        href="{{ route('pasien.janjiperawat', $sort_link['tanggal']) }}">Tanggal Janji</a>
                                    @if ($sort_status['sort'] == 'tanggal' && $sort_status['order'] == 'asc')
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                    @if ($sort_status['sort'] == 'tanggal' && $sort_status['order'] == 'desc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @endif
                                </th>
                                <th class="bg-secondary"> <a
                                        href="{{ route('pasien.janjiperawat', $sort_link['perawat']) }}">Perawat</a>
                                    @if ($sort_status['sort'] == 'perawat' && $sort_status['order'] == 'asc')
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                    @if ($sort_status['sort'] == 'perawat' && $sort_status['order'] == 'desc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @endif
                                </th>
                                <th class="bg-secondary">No Telp Perawat</th>
                                <th class="bg-secondary"><a
                                    href="{{ route('pasien.janjiperawat', $sort_link['status']) }}">Status</a>
                                @if ($sort_status['sort'] == 'status' && $sort_status['order'] == 'asc')
                                    <i class="fa-solid fa-arrow-up"></i>
                                @endif
                                @if ($sort_status['sort'] == 'status' && $sort_status['order'] == 'desc')
                                    <i class="fa-solid fa-arrow-down"></i>
                                @endif</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($janji_rawat as $key => $a)
                                <tr>
                                    <th>{{ $sort_status['sort'] == 'id' && $sort_status['order'] == 'desc' ? $janji_rawat->count() - $key : $key + 1 }}
                                    </th>
                                    <td>{{ date('d F Y', strtotime($a->jr_tanggal)) }}</td>
                                    <td>{{ $a->pr_nama }}</td>
                                    <td>{{ $a->pr_telp }}</td>
                                    <td>{{ $a->trashed() ? 'Completed' : 'Active' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
