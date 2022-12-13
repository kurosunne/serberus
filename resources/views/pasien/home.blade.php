@extends('layout.setup')

@section('main')
    <div class="h-[55rem] w-full flex justify-center items-start mb-10">
        @extends('pasien.navbar')
        <div class="h-[95%] w-11/12 flex flex-row items-start justify-start mt-6">
            <div class="h-full w-4/6 mr-3">
                <div class="w-full h-3/6 rounded-[15px] flex flex-col justify-center item-start"
                    style="border: 4px solid #FFB034">
                    <div class="h-10 w-full text-center mt-1 mb-1">
                        <p class="font-bold text-xl">
                            Unggulan Kami
                        </p>
                    </div>
                    {{-- carosel --}}
                    <div class="carousel w-full h-5/6">
                        {{-- page 1 carosel --}}
                        <div id="item1" class="carousel-item relative w-full">
                            @for ($i = 0; $i < 3; $i++)
                                {{-- card --}}
                                <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                    {{-- foto card --}}
                                    <div class="h-2/6 mt-4 flex item-center justify-center pt-3">
                                        <img src="{{ url('foto/dk' . $dokter[$i]->dk_id . '.png') }}" alt="Dokter"
                                            class="rounded-full h-full" />
                                    </div>
                                    {{-- deskripsi card --}}
                                    <div class="card-body items-center text-center">
                                        <h2 class="card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <p class="text-lg text-white">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</p>
                                        {{-- button href --}}
                                        <div class="card-actions w-full">
                                            <button class="btn btn-primary w-full ">Detail</button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#item3" class="btn btn-circle">❮</a>
                                <a href="#item2" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        {{-- carosel page 2 --}}
                        <div id="item2" class="carousel-item relative w-full">
                            @for ($i = 3; $i < 6; $i++)
                                {{-- card --}}
                                <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                    {{-- foto card --}}
                                    <div class="h-2/6 mt-4 flex item-center justify-center pt-3">
                                        <img src="{{ url('foto/dk' . $dokter[$i]->dk_id . '.png') }}" alt="Dokter"
                                            class="rounded-full h-full" />
                                    </div>
                                    {{-- deskripsi card --}}
                                    <div class="card-body items-center text-center">
                                        <h2 class="card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <p class="text-lg text-white">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</p>
                                        {{-- button href --}}
                                        <div class="card-actions w-full">
                                            <button class="btn btn-primary  w-full">Detail</button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#item1" class="btn btn-circle">❮</a>
                                <a href="#item3" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        {{-- page 3 carosel --}}
                        <div id="item3" class="carousel-item relative w-full">
                            @for ($i = 6; $i < 9; $i++)
                                {{-- card --}}
                                <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                    {{-- foto card --}}
                                    <div class="h-2/6 mt-4 flex item-center justify-center pt-3">
                                        <img src="{{ url('foto/dk' . $dokter[$i]->dk_id . '.png') }}" alt="Dokter"
                                            class="rounded-full h-full" />
                                    </div>
                                    {{-- deskripsi card --}}
                                    <div class="card-body items-center text-center">
                                        <h2 class="card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <p class="text-lg text-white">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</p>
                                        {{-- button href --}}
                                        <div class="card-actions  w-full">
                                            <button class="btn btn-primary  w-full">Detail</button>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#item2" class="btn btn-circle">❮</a>
                                <a href="#item1" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center w-full py-2 gap-2">
                        <a href="#item1" class="btn btn-xs">1</a>
                        <a href="#item2" class="btn btn-xs">2</a>
                        <a href="#item3" class="btn btn-xs">3</a>
                    </div>
                </div>
                <div class="w-full h-3/6 rounded-[15px] mt-6" style="border: 4px solid #FFB034">
                    <div class="h-10 w-full text-center mt-1 mb-1">
                        <p class="font-bold text-xl">
                            Obat Terlaris
                        </p>
                    </div>
                    {{-- carosel --}}
                    <div class="carousel w-full h-[80%]">
                        {{-- page 1 carosel --}}
                        <div id="obat1" class="carousel-item relative w-full">
                            @for ($i = 0; $i < 3; $i++)
                                {{-- card --}}
                                <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                        <div class="h-1/2 w-full">
                                            {{-- image card --}}
                                            <img src="{{ url('obat/' . $obat[$i]->ob_id . '.png') }}" alt="obat"
                                                class="ml-2 object-contain object-center w-5/6 h-full">
                                        </div>
                                        <div class="h-2/6 w-full text-center">
                                            {{-- judul dan harga barang --}}
                                            <h2 class="w-full text-center text-white font-bold text-lg">
                                                {{ $obat[$i]->ob_nama }}</h2>
                                            <p class="w-full text-white">Rp.
                                                {{ number_format($obat[$i]->ob_harga, 2, ',', '.') }}</p>
                                        </div>
                                    </figure>
                                    <div class="card-body w-[60%] text-center p-4">
                                        <div class="w-full h-full bg-base-100 rounded-lg p-2 justify-center">
                                            {{-- deskripsi --}}
                                            <p class="w-full h-[80%] text-left text-sm align-middle">
                                                {{ substr($obat[$i]->ob_deskripsi, 0, 200) }}
                                                {{ strlen($obat[$i]->ob_deskripsi) >= 200 ? '...' : '' }}
                                            </p>
                                            {{-- href detail --}}
                                            <a href="{{route('pasien.detailobat',["id"=>$obat[$i]->ob_id])}}"><button class="btn btn-success mb-3 w-full">Beli</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        {{-- carosel page 2 --}}
                        <div id="obat2" class="carousel-item relative w-full">
                            @for ($i = 3; $i < 6; $i++)
                                {{-- card --}}
                                <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                        <div class="h-1/2 w-full">
                                            {{-- image card --}}
                                            <img src="{{ url('obat/' . $obat[$i]->ob_id . '.png') }}" alt="obat"
                                                class="ml-2 object-contain object-center w-5/6 h-full">
                                        </div>
                                        <div class="h-2/6 w-full text-center">
                                            {{-- judul dan harga barang --}}
                                            <h2 class="w-full text-center text-white font-bold text-lg">
                                                {{ $obat[$i]->ob_nama }}</h2>
                                            <p class="w-full text-white">Rp.
                                                {{ number_format($obat[$i]->ob_harga, 2, ',', '.') }}</p>
                                        </div>
                                    </figure>
                                    <div class="card-body w-[60%] text-center p-4">
                                        <div class="w-full h-full bg-base-100 rounded-lg p-2 justify-center">
                                            {{-- deskripsi --}}
                                            <p class="w-full h-[80%] text-left text-sm align-middle">
                                                {{ substr($obat[$i]->ob_deskripsi, 0, 200) }}
                                                {{ strlen($obat[$i]->ob_deskripsi) >= 200 ? '...' : '' }}
                                            </p>
                                            {{-- href detail --}}
                                            <a href="{{route('pasien.detailobat',["id"=>$obat[$i]->ob_id])}}"><button class="btn btn-success mb-3 w-full">Beli</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat1" class="btn btn-circle">❮</a>
                                <a href="#obat3" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        {{-- page 3 carosel --}}
                        <div id="obat3" class="carousel-item relative w-full">
                            @for ($i = 6; $i < 9; $i++)
                                {{-- card --}}
                                <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                        <div class="h-1/2 w-full">
                                            {{-- image card --}}
                                            <img src="{{ url('obat/' . $obat[$i]->ob_id . '.png') }}" alt="obat"
                                                class="ml-2 object-contain object-center w-5/6 h-full">
                                        </div>
                                        <div class="h-2/6 w-full text-center">
                                            {{-- judul dan harga barang --}}
                                            <h2 class="w-full text-center text-white font-bold text-lg">
                                                {{ $obat[$i]->ob_nama }}</h2>
                                            <p class="w-full text-white">Rp.
                                                {{ number_format($obat[$i]->ob_harga, 2, ',', '.') }}</p>
                                        </div>
                                    </figure>
                                    <div class="card-body w-[60%] text-center p-4">
                                        <div class="w-full h-full bg-base-100 rounded-lg p-2 justify-center">
                                            {{-- deskripsi --}}
                                            <p class="w-full h-[80%] text-left text-sm align-middle">
                                                {{ substr($obat[$i]->ob_deskripsi, 0, 200) }}
                                                {{ strlen($obat[$i]->ob_deskripsi) >= 200 ? '...' : '' }}
                                            </p>
                                            {{-- href detail --}}
                                            <a href="{{route('pasien.detailobat',["id"=>$obat[$i]->ob_id])}}"><button class="btn btn-success mb-3 w-full">Beli</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat2" class="btn btn-circle">❮</a>
                                <a href="#obat1" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center w-full py-2 gap-2">
                        <a href="#obat1" class="btn btn-xs">1</a>
                        <a href="#obat2" class="btn btn-xs">2</a>
                        <a href="#obat3" class="btn btn-xs">3</a>
                    </div>
                </div>
            </div>
            <div class="h-full w-2/6 ml-3">
                <div class="w-full h-3/6 rounded-[15px] flex flex-col items-center p-3" style="border: 4px solid #FFB034">
                    <div class="w-full h-[15%] flex">
                        <div class="h-full w-1/2 flex items-center justify-start">
                            <p class="font-bold font-lg">Riwayat Konsultasi</p>
                        </div>
                        <div class="h-full w-1/2 flex items-center justify-end">
                            {{-- route menuju riwayat --}}
                            <a class="font-bold font-lg text-secondary" href="">See More...</a>
                        </div>
                    </div>
                    @for ($i = 0; $i < 3; $i++)
                        {{-- card --}}
                        @if ($i >= count($konsultasi))
                            @php
                                break;
                            @endphp
                        @endif
                        <div class="w-full h-[25%] bg-secondary rounded-lg mt-3 flex p-2">
                            <div class="h-full w-[20%]">
                                <img src="{{ url('foto/dk' . $konsultasi[$i]->dk_id . '.png') }}" alt=""
                                    class="rounded-full h-full">
                            </div>
                            <div class="h-full w-[50%] flex flex-col justify-center mx-3">
                                <p class="text-lg font-bold text-white">{{ $konsultasi[$i]->Dokter->dk_nama }}</p>
                                <p class="text-sm text-white">Tanggal Konsultasi
                                    {{ date_format($konsultasi[$i]->created_at, 'm/d/Y') }}</p>
                            </div>
                            <div class="h-full w-[20%] flex flex-col item-center justify-center">
                                <div class="btn btn-success">Detail</div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="w-full h-3/6 rounded-[15px] flex flex-col items-center p-3 mt-6"
                    style="border: 4px solid #FFB034">
                    <div class="w-full h-[15%] flex">
                        <div class="h-full w-1/2 flex items-center justify-start">
                            <p class="font-bold font-lg">Riwayat Transaksi Obat</p>
                        </div>
                        <div class="h-full w-1/2 flex items-center justify-end">
                            {{-- route menuju riwayat --}}
                            <a class="font-bold font-lg text-secondary">See More...</a>
                        </div>
                    </div>

                    @php
                        $i = 0;
                    @endphp
                    @foreach ($hjual_obat as $item)
                        @foreach ($item->DjualObat as $item2)
                            <div class="w-full rounded-lg h-[25%] bg-secondary mt-3 flex p-2">
                                <div class="h-full w-[20%]">
                                    <img src="{{ url('image/obat.png') }}" alt="obat"
                                        class="rounded-full object-contain object-center w-5/6 h-full">
                                </div>
                                <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                                    <p class="text-lg font-bold mt-3 text-white">{{$item2->Obat->ob_nama}}</p>
                                    <p class="text-sm mb-3 text-white">Tanggal Beli {{date('d F Y', strtotime($item->created_at))}}</p>
                                </div>
                                <div class="h-full w-[20%] flex flex-col item-center justify-center">
                                    <div class="btn btn-success">Detail</div>
                                </div>
                            </div>

                            @if (++$i==3)
                                @php
                                    break;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach


                </div>
            </div>
        </div>
    @endsection
