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
                        <a href="{{ route('pasien.historitemu') }}">
                            <div class="btn btn-primary ml-10 mr-3">Riwayat Temu</div>
                        </a>
                        <a href="{{ route('pasien.historiperawat') }}">
                            <div class="btn btn-primary">Riwayat Rawat</div>
                        </a>
                        <a href="{{ route('pasien.historiobat') }}">
                            <div class=" text-black btn btn-secondary ml-3">
                                <p class="text-white"> Riwayat Obat </p>
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
                                <th class="bg-secondary">No</th>
                                <th class="bg-secondary">Nama Obat</th>
                                <th class="bg-secondary">Jumlah Dibeli</th>
                                <th class="bg-secondary">Harga Obat</th>
                                <th class="bg-secondary">Total Harga</th>
                                <th class="bg-secondary">Tanggal Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($hjual_obat as $item)
                                @foreach ($item->DjualObat as $item2)
                                    <tr>
                                        <th class="{{$i%2==1 ? "bg-primary":""}}">{{++$i}}</th>
                                        <td class="{{$i%2==0 ? "bg-primary":""}}">{{$item2->Obat->ob_nama}}</td>
                                        <td class="{{$i%2==0 ? "bg-primary":""}}">{{$item2->do_stok}} pcs</td>
                                        <td class="{{$i%2==0 ? "bg-primary":""}}">{{"Rp ". number_format($item2->Obat->ob_harga,2,',','.')}}</td>
                                        <td class="{{$i%2==0 ? "bg-primary":""}}">{{"Rp ". number_format(($item2->Obat->ob_harga * $item2->do_stok ),2,',','.')}}</td>
                                        <td class="{{$i%2==0 ? "bg-primary":""}}">{{date('d F Y', strtotime($item->ho_tanggal))}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
