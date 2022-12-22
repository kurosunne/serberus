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
                            Dokter Unggulan Kami
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
                                    <div class="card-body items-center text-center pt-0 mb-0">
                                        <h2 class="mt-0 card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <h2 class="text-white text-lg">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</h2>
                                        {{-- button href --}}
                                        <form method="POST" action="{{route('pasien.createJanji',['dokter_id' => $dokter[$i]->dk_id])}}" class="w-full flex pt-0 mt-0 mb-0">
                                            @csrf
                                            <input class="input w-[49%]" type="date" name="tanggal">
                                            <button class="btn btn-primary ml-1 w-[49%] ">Create Janji</button>
                                        </form>
                                        <a class="w-full mt-0" href="{{route('pasien.createKonsultasi',['dokter_id' => $dokter[$i]->dk_id])}}">
                                            <button class="btn btn-primary w-full">Konsultasi</button>
                                        </a>
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
                                    <div class="card-body items-center text-center pt-0 mb-0">
                                        <h2 class="mt-0 card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <h2 class="text-white text-lg">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</h2>
                                        {{-- button href --}}
                                        <form method="POST" action="{{route('pasien.createJanji',['dokter_id' => $dokter[$i]->dk_id])}}" class="w-full flex pt-0 mt-0 mb-0">
                                            @csrf
                                            <input class="input w-[49%]" type="date" name="tanggal">
                                            <button class="btn btn-primary ml-1 w-[49%] ">Create Janji</button>
                                        </form>
                                        <a class="w-full mt-0" href="{{route('pasien.createKonsultasi',['dokter_id' => $dokter[$i]->dk_id])}}">
                                            <button class="btn btn-primary w-full">Konsultasi</button>
                                        </a>
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
                                    <div class="card-body items-center text-center pt-0 mb-0">
                                        <h2 class="mt-0 card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <h2 class="text-white text-lg">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</h2>
                                        {{-- button href --}}
                                        <form method="POST" action="{{route('pasien.createJanji',['dokter_id' => $dokter[$i]->dk_id])}}" class="w-full flex pt-0 mt-0 mb-0">
                                            @csrf
                                            <input class="input w-[49%]" type="date" name="tanggal">
                                            <button class="btn btn-primary ml-1 w-[49%] ">Create Janji</button>
                                        </form>
                                        <a class="w-full mt-0" href="{{route('pasien.createKonsultasi',['dokter_id' => $dokter[$i]->dk_id])}}">
                                            <button class="btn btn-primary w-full">Konsultasi</button>
                                        </a>
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
                            Perawat Unggulan Kami
                        </p>
                    </div>
                    {{-- carosel --}}
                    <div class="carousel w-full h-[80%]">
                        {{-- page 1 carosel --}}
                        <div id="obat1" class="carousel-item relative w-full">
                            @for ($i = 0; $i < 3; $i++)
                                {{-- card --}}
                                <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                    {{-- foto card --}}
                                    <div class="h-2/6 mt-4 flex item-center justify-center pt-3">
                                        <img src="{{ url('foto/pr' . $perawat[$i]->pr_id . '.png') }}" alt="Dokter"
                                            class="rounded-full h-full" />
                                    </div>
                                    {{-- deskripsi card --}}
                                    <div class="card-body items-center text-center pt-0 mb-0">
                                        <h2 class="my-2 card-title text-white">{{ $perawat[$i]->pr_nama }}</h2>
                                        {{-- button href --}}
                                        <form method="POST" action="{{route('pasien.createJanjiRawat',['perawat_id' => $perawat[$i]->pr_id])}}" class="w-full flex-col items-center pt-0 mt-0 mb-0">
                                            @csrf
                                            <input class="input w-full" type="date" name="tanggal">
                                            <button class="btn btn-primary mt-2 w-full ">Create Janji Rawat</button>
                                        </form>
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
                                <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                    {{-- foto card --}}
                                    <div class="h-2/6 mt-4 flex item-center justify-center pt-3">
                                        <img src="{{ url('foto/dk' . $dokter[$i]->dk_id . '.png') }}" alt="Dokter"
                                            class="rounded-full h-full" />
                                    </div>
                                    {{-- deskripsi card --}}
                                    <div class="card-body items-center text-center pt-0 mb-0">
                                        <h2 class="mt-0 card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <h2 class="text-white text-lg">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</h2>
                                        {{-- button href --}}
                                        <form method="POST" action="{{route('pasien.createJanji',['dokter_id' => $dokter[$i]->dk_id])}}" class="w-full flex pt-0 mt-0 mb-0">
                                            @csrf
                                            <input class="input w-[49%]" type="date" name="tanggal">
                                            <button class="btn btn-primary ml-1 w-[49%] ">Create Janji</button>
                                        </form>
                                        <a class="w-full mt-0" href="{{route('pasien.createKonsultasi',['dokter_id' => $dokter[$i]->dk_id])}}">
                                            <button class="btn btn-primary w-full">Konsultasi</button>
                                        </a>
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
                                {{-- card --}}
                                <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                    {{-- foto card --}}
                                    <div class="h-2/6 mt-4 flex item-center justify-center pt-3">
                                        <img src="{{ url('foto/dk' . $dokter[$i]->dk_id . '.png') }}" alt="Dokter"
                                            class="rounded-full h-full" />
                                    </div>
                                    {{-- deskripsi card --}}
                                    <div class="card-body items-center text-center pt-0 mb-0">
                                        <h2 class="mt-0 card-title text-white">{{ $dokter[$i]->dk_nama }}</h2>
                                        <h2 class="text-white text-lg">Spesialis {{ $dokter[$i]->spesialis->sp_nama }}</h2>
                                        {{-- button href --}}
                                        <form method="POST" action="{{route('pasien.createJanji',['dokter_id' => $dokter[$i]->dk_id])}}" class="w-full flex pt-0 mt-0 mb-0">
                                            @csrf
                                            <input class="input w-[49%]" type="date" name="tanggal">
                                            <button class="btn btn-primary ml-1 w-[49%] ">Create Janji</button>
                                        </form>
                                        <a class="w-full mt-0" href="{{route('pasien.createKonsultasi',['dokter_id' => $dokter[$i]->dk_id])}}">
                                            <button class="btn btn-primary w-full">Konsultasi</button>
                                        </a>
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
                            <a class="font-bold font-lg text-secondary" href="{{ route('pasien.historitemu') }}">See More...</a>
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
                                <a href="{{route('pasien.konsultasi',["konsultasi_id"=>$konsultasi[$i]->ks_id])}}" class="btn btn-success">Detail</a>
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
                            <a class="font-bold font-lg text-secondary" href="{{ route('pasien.historiobat') }}">See More...</a>
                        </div>
                    </div>

                    @php
                        $i = 0;
                    @endphp
                    @foreach ($hjual_obat as $item)
                        @if ($i >= 3)
                            @php
                                break;
                            @endphp
                        @endif
                        @foreach ($item->DjualObat as $item2)
                            @if ($i++ >= 3)
                                @php
                                    break;
                                @endphp
                            @endif
                            <div class="w-full rounded-lg h-[25%] bg-secondary mt-3 flex p-2">
                                <div class="h-full w-[20%]">
                                    <img src="{{ url('image/obat.png') }}" alt="obat"
                                        class="rounded-full object-contain object-center w-5/6 h-full">
                                </div>
                                <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                                    <p class="text-lg font-bold mt-3 text-white">{{ $item2->Obat->ob_nama }}</p>
                                    <p class="text-sm mb-3 text-white">Tanggal Beli
                                        {{ date('d F Y', strtotime($item->created_at)) }}</p>
                                </div>
                                <div class="h-full w-[25%] flex flex-col item-center justify-center">
                                    <a href="{{route('pasien.detailobat',['id' => $item2->ob_id])}}" class="btn btn-success">Detail Obat</a>
                                </div>
                            </div>
                        @endforeach
                    @endforeach


                </div>
            </div>
        </div>
    @endsection
