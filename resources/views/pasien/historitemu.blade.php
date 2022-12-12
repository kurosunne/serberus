@extends('layout.setup')

@section('main')
<div class="h-full w-full flex justify-center items-start">
    @extends('pasien.navbar')
    <div class="h-4/5 w-11/12 flex flex-col items-start justify-start mt-10 p-0">
        <div class="h-10 w-full m-0 flex flex-row m-0">
            <div class="h-full w-4/12 flex flex-col justify-center mr-9">
                <div class="w-full h-full flex items-center">
                    <div class=" w-5/12 max-w-md text-xl text-primary">Filter Dengan</div>
                    <select name="rs" id="rs" class="input input-bordered input-primary w-1/3 h-5/6 max-w-md mt-2">
                        <option value="dumi">Dokter</option>
                        <option value="dumi">Perawat</option>
                    </select>
                    @error('rs')
                        <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="h-full w-6/12 flex flex-col justify-center">
                <div class="w-full h-full flex items-center justify-center">
                    <div class="btn btn-primary ml-10 mr-3"><a href="{{route('pasien.historitemu')}}">Riwayat Temu</a></div>
                    <div class=" text-black btn btn-secondary ml-3"> <p class="text-white"> <a href="{{route('pasien.historiobat')}}">Riwayat Obat </a> </p></div>
                </div>
            </div>
            <div class="h-full w-5/12 flex flex-row items-center justify-end">
                <div class="max-w-md text-xl text-primary w-1/3">Sortir Dengan</div>
                <select name="rs" id="rs" class="input input-bordered input-primary h-5/6 max-w-md mt-2 w-1/4">
                    <option value="dumi">Alfabetikal A-Z</option>
                    <option value="dumi">Alfabetikal Z-A</option>
                    <option value="dumi">Tanggal</option>
                </select>
                @error('rs')
                    <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="h-64 w-full">
            <div class="overflow-x-auto mt-10">
                <table class="table w-full text-center">
                    <!-- head -->
                    <thead class="text-base-100">
                        <tr>
                            <th class="bg-secondary"><a
                                    href="{{ route('pasien.janji', $sort_link['id']) }}">No</a>
                                @if ($sort_status['sort'] == 'id' && $sort_status['order'] == 'asc')
                                    <i class="fa-solid fa-arrow-up"></i>
                                @endif
                                @if ($sort_status['sort'] == 'id' && $sort_status['order'] == 'desc')
                                    <i class="fa-solid fa-arrow-down"></i>
                                @endif
                            </th>
                            <th class="bg-secondary"> <a
                                    href="{{ route('pasien.janji', $sort_link['tanggal']) }}">Tanggal Janji</a>
                                @if ($sort_status['sort'] == 'tanggal' && $sort_status['order'] == 'asc')
                                    <i class="fa-solid fa-arrow-up"></i>
                                @endif
                                @if ($sort_status['sort'] == 'tanggal' && $sort_status['order'] == 'desc')
                                    <i class="fa-solid fa-arrow-down"></i>
                                @endif
                            </th>
                            <th class="bg-secondary"> <a
                                    href="{{ route('pasien.janji', $sort_link['dokter']) }}">Dokter</a>
                                @if ($sort_status['sort'] == 'dokter' && $sort_status['order'] == 'asc')
                                    <i class="fa-solid fa-arrow-up"></i>
                                @endif
                                @if ($sort_status['sort'] == 'dokter' && $sort_status['order'] == 'desc')
                                    <i class="fa-solid fa-arrow-down"></i>
                                @endif
                            </th>
                            <th class="bg-secondary">No Telp Dokter</th>
                            <th class="bg-secondary"><a
                                href="{{ route('pasien.janji', $sort_link['status']) }}">Status</a>
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
                                <th>{{ $sort_status['sort'] == 'id' && $sort_status['order'] == 'desc' ? $janji_temu->count() - $key : $key + 1 }}
                                </th>
                                <td>{{ date('d F Y', strtotime($a->jt_tanggal)) }}</td>
                                <td>{{ $a->dk_nama }}</td>
                                <td>{{ $a->dk_telp }}</td>
                                <td>{{ $a->trashed() ? 'Completed' : 'Active' }}</td>
                                <td>
                                    <div class="btn btn-success"> Detail</div>
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
