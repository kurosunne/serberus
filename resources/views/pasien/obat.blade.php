@extends('layout.setup')

@section('main')
    <div class="h-full w-full flex justify-center items-start">
        @extends('pasien.navbar')
        <div class="h-4/5 w-11/12 flex flex-col items-center justify-start mt-10 p-4 border-black rounded-[15px]"
            style="border: 4px solid #FFB034">
            <form class="h-10 w-full m-0 flex flex-row m-0" action="{{ route('pasien.obat', ['page' => $page]) }}">
                <div class="max-w-sm text-xl mt-2 w-1/12 text-center">Sortir</div>
                <select name="filter" id="rs"
                    class="input input-bordered input-primary h-5/6 max-w-md mt-2 w-1/8 mr-2">
                    <option value="alfasc">Alfabetikal A-Z</option>
                    <option value="alfdesc">Alfabetikal Z-A</option>
                    <option value="harasc">Harga Terendah</option>
                    <option value="hardesc">Harga Tertinggi</option>
                </select>

                <div class="h-full mt-1 w-[30%] flex flex-col justify-start items-start">
                    <div class="flex justify-center">
                        <div class="mb-3 xl:w-96">
                            <div class="input-group relative flex flex-row items-stretch w-full mb-4 rounded">
                                <input type="search"
                                    class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    placeholder="Search" aria-label="Search" aria-describedby="button-addon2"
                                    name="search">
                                <button
                                    class="input-group-text flex items-center px-3 py-1.5 text-base font-normal text-gray-700 text-center btn-primary whitespace-nowrap rounded"
                                    id="basic-addon2">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
                                        class="w-4" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-full w-4/6 flex flex-row items-center justify-end ml-auto">
                    <div class="w-full h-full flex items-center">
                        <div class=" w-[40%] max-w-md text-lg font-bold ml-auto">Menampilkan {{ count($obat) }} dari
                            {{ $total->ctr }} barang
                        </div>
                    </div>
                </div>
            </form>

            <div class="h-5/6 w-full my-4 flex flex-col">
                {{-- List barang  nanti di for --}}
                <div class="h-3/6 w-full flex flex-row">
                    @for ($i = 0; $i < 4; $i++)
                        @if ($i >= count($obat))
                            @php
                                break;
                            @endphp
                        @endif
                        {{-- card --}}
                        <div class="card card-side bg-secondary w-[22%] shadow-xl mx-4 ml-8">
                            <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                <div class="h-1/2 w-full">
                                    {{-- image card --}}
                                    <img src="{{ url('obat/' . $obat[$i]->ob_id . '.png') }}" alt="obat"
                                        class="ml-2 object-contain object-center w-5/6 h-full">
                                </div>
                                <div class="h-2/6 w-full text-center">
                                    {{-- judul dan harga barang --}}
                                    <h2 class="w-full text-center text-white font-bold text-lg">{{ $obat[$i]->ob_nama }}
                                    </h2>
                                    <p class="w-full text-white">Rp. {{ number_format($obat[$i]->ob_harga, 2, ',', '.') }}
                                    </p>
                                </div>
                            </figure>
                            <div class="card-body w-[60%] text-center p-4">
                                <div class="w-full h-full bg-base-100 rounded-lg p-2 justify-center">
                                    {{-- deskripsi --}}
                                    <p class="w-full h-[80%] text-justify text-sm align-middle">
                                        {{ substr($obat[$i]->ob_deskripsi, 0, 200) }}
                                        {{ strlen($obat[$i]->ob_deskripsi) >= 200 ? '...' : '' }}
                                    </p>
                                    {{-- href detail --}}
                                    <a href="{{route('pasien.detailobat',["id"=>$obat[$i]->ob_id])}}"><button class="btn btn-success mb-3 w-full">Beli</button></a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="h-3/6 w-full flex flex-row mt-4">
                    @for ($i = 4; $i < 8; $i++)
                        @if ($i >= count($obat))
                            @php
                                break;
                            @endphp
                        @endif
                        {{-- card --}}
                        <div class="card card-side bg-secondary w-[22%] shadow-xl mx-4 ml-8">
                            <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                <div class="h-1/2 w-full">
                                    {{-- image card --}}
                                    <img src="{{ url('obat/' . $obat[$i]->ob_id . '.png') }}" alt="obat"
                                        class="ml-2 object-contain object-center w-5/6 h-full">
                                </div>
                                <div class="h-2/6 w-full text-center">
                                    {{-- judul dan harga barang --}}
                                    <h2 class="w-full text-center text-white font-bold text-lg">{{ $obat[$i]->ob_nama }}
                                    </h2>
                                    <p class="w-full text-white">Rp. {{ number_format($obat[$i]->ob_harga, 2, ',', '.') }}
                                    </p>
                                </div>
                            </figure>
                            <div class="card-body w-[60%] text-center p-4">
                                <div class="w-full h-full bg-base-100 rounded-lg p-2 justify-center">
                                    {{-- deskripsi --}}
                                    <p class="w-full h-[80%] text-justify text-sm align-middle">
                                        {{ substr($obat[$i]->ob_deskripsi, 0, 200) }}
                                        {{ strlen($obat[$i]->ob_deskripsi) >= 200 ? '...' : '' }}
                                    </p>
                                    {{-- href detail --}}
                                    <a href="{{route('pasien.detailobat',["id"=>$obat[$i]->ob_id])}}"><button class="btn btn-success mb-3 w-full">Beli</button></a>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="h-10 mt-2 w-full flex flex-row items-center justify-center font-bold">
                <div
                    class="h-10 w-3/6 flex flex-row items-center justify-center place-content-stretch p-1 text-primary text-lg">
                    <div class="w-[15%] h-full ml-10">
                        <a href="{{ route('pasien.obat', ['page' => 1, 'search' => $search, 'filter' => $filter]) }}"
                            class="write text-secondary">
                            << First </a>
                    </div>
                    <div class="w-[15%] h-full ml-2">
                        @if ($page != 1)
                            <a href="{{ route('pasien.obat', ['page' => $page - 1, 'search' => $search, 'filter' => $filter]) }}"
                                class="write ">
                                < Prev</a>
                                @else
                                    <a class="write">
                                        < Prev </a>
                        @endif

                    </div>
                    <div class="w-[15%] h-full">
                        @if ($page != intval($total->ctr / 8 + 1))
                            <a href="{{ route('pasien.obat', ['page' => $page + 1, 'search' => $search, 'filter' => $filter]) }}"
                                class="write">Next ></a>
                        @else
                            <a class="write">Next ></a>
                        @endif
                    </div>
                    <div class="w-[15%] h-full">
                        <a href="{{ route('pasien.obat', ['page' => intval($total->ctr / 8 + 1), 'search' => $search, 'filter' => $filter]) }}"
                            class="write text-secondary">Last >></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
