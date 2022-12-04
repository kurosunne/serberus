@extends('layout.setup')

@section('main')
<div class="h-full w-full flex justify-center items-start">
    @extends('pasien.navbar')
    <div class="h-4/5 w-11/12 flex flex-col items-center justify-start mt-10 p-4 border-black rounded-[15px]" style="border: 4px solid #FFB034">
        <div class="h-10 w-full m-0 flex flex-row m-0">
            <div class="h-full w-[30%] flex flex-col justify-start items-start">
                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                      <div class="input-group relative flex flex-row items-stretch w-full mb-4 rounded">
                        <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <span class="input-group-text flex items-center px-3 py-1.5 text-base font-normal text-gray-700 text-center whitespace-nowrap rounded" id="basic-addon2">
                          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                          </svg>
                        </span>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="h-full w-4/6 flex flex-row items-center justify-end">
                <div class="w-full h-full flex items-center">
                    <div class=" w-[40%] max-w-md text-md text-primary">Menampilkan 20 dari 100 barang</div>
                    <div class=" w-2/6 max-w-md text-xl text-primary text-center">Filter Dengan</div>
                    <select name="rs" id="rs" class="input input-bordered input-primary w-1/4 h-5/6 max-w-md mt-2">
                        <option value="dumi">Obat</option>
                        <option value="dumi">Vitamin</option>
                    </select>
                    @error('rs')
                        <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="max-w-md text-xl text-primary w-1/4 text-center">Sortir Dengan</div>
                <select name="rs" id="rs" class="input input-bordered input-primary h-5/6 max-w-md mt-2 w-1/4">
                    <option value="dumi">Alfabetikal A-Z</option>
                    <option value="dumi">Alfabetikal Z-A</option>
                    <option value="dumi">Harga Terendah</option>
                    <option value="dumi">Harga Tertinggi</option>
                </select>
                @error('rs')
                    <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="h-5/6 w-full my-4 flex flex-col">
            {{-- List barang  nanti di for--}}
            <div class="h-3/6 w-full flex flex-row">
                {{-- card --}}
                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                        <div class="h-1/2 w-full">
                            {{-- image card --}}
                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                class="ml-2 object-contain object-center w-5/6 h-full">
                        </div>
                        <div class="h-2/6 w-full text-center">
                            {{-- judul dan harga barang --}}
                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                            <p class="w-full">Rp. 30.000</p>
                        </div>
                    </figure>
                    <div class="card-body w-[60%] text-center p-4">
                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                            {{-- deskripsi --}}
                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                            </p>
                            {{-- href detail --}}
                            <button class="btn btn-success mb-3">Beli</button>
                        </div>
                    </div>
                </div>
                                {{-- card --}}
                                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                        <div class="h-1/2 w-full">
                                            {{-- image card --}}
                                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                                class="ml-2 object-contain object-center w-5/6 h-full">
                                        </div>
                                        <div class="h-2/6 w-full text-center">
                                            {{-- judul dan harga barang --}}
                                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                                            <p class="w-full">Rp. 30.000</p>
                                        </div>
                                    </figure>
                                    <div class="card-body w-[60%] text-center p-4">
                                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                            {{-- deskripsi --}}
                                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                            </p>
                                            {{-- href detail --}}
                                            <button class="btn btn-success mb-3">Beli</button>
                                        </div>
                                    </div>
                                </div>
                                                {{-- card --}}
                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                        <div class="h-1/2 w-full">
                            {{-- image card --}}
                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                class="ml-2 object-contain object-center w-5/6 h-full">
                        </div>
                        <div class="h-2/6 w-full text-center">
                            {{-- judul dan harga barang --}}
                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                            <p class="w-full">Rp. 30.000</p>
                        </div>
                    </figure>
                    <div class="card-body w-[60%] text-center p-4">
                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                            {{-- deskripsi --}}
                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                            </p>
                            {{-- href detail --}}
                            <button class="btn btn-success mb-3">Beli</button>
                        </div>
                    </div>
                </div>
                                {{-- card --}}
                                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                        <div class="h-1/2 w-full">
                                            {{-- image card --}}
                                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                                class="ml-2 object-contain object-center w-5/6 h-full">
                                        </div>
                                        <div class="h-2/6 w-full text-center">
                                            {{-- judul dan harga barang --}}
                                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                                            <p class="w-full">Rp. 30.000</p>
                                        </div>
                                    </figure>
                                    <div class="card-body w-[60%] text-center p-4">
                                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                            {{-- deskripsi --}}
                                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                            </p>
                                            {{-- href detail --}}
                                            <button class="btn btn-success mb-3">Beli</button>
                                        </div>
                                    </div>
                                </div>

            </div>
            <div class="h-3/6 w-full flex flex-row mt-4">
                                {{-- card --}}
                                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                        <div class="h-1/2 w-full">
                                            {{-- image card --}}
                                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                                class="ml-2 object-contain object-center w-5/6 h-full">
                                        </div>
                                        <div class="h-2/6 w-full text-center">
                                            {{-- judul dan harga barang --}}
                                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                                            <p class="w-full">Rp. 30.000</p>
                                        </div>
                                    </figure>
                                    <div class="card-body w-[60%] text-center p-4">
                                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                            {{-- deskripsi --}}
                                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                            </p>
                                            {{-- href detail --}}
                                            <button class="btn btn-success mb-3">Beli</button>
                                        </div>
                                    </div>
                                </div>
                                                {{-- card --}}
                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                        <div class="h-1/2 w-full">
                            {{-- image card --}}
                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                class="ml-2 object-contain object-center w-5/6 h-full">
                        </div>
                        <div class="h-2/6 w-full text-center">
                            {{-- judul dan harga barang --}}
                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                            <p class="w-full">Rp. 30.000</p>
                        </div>
                    </figure>
                    <div class="card-body w-[60%] text-center p-4">
                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                            {{-- deskripsi --}}
                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                            </p>
                            {{-- href detail --}}
                            <button class="btn btn-success mb-3">Beli</button>
                        </div>
                    </div>
                </div>
                                {{-- card --}}
                                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                        <div class="h-1/2 w-full">
                                            {{-- image card --}}
                                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                                class="ml-2 object-contain object-center w-5/6 h-full">
                                        </div>
                                        <div class="h-2/6 w-full text-center">
                                            {{-- judul dan harga barang --}}
                                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                                            <p class="w-full">Rp. 30.000</p>
                                        </div>
                                    </figure>
                                    <div class="card-body w-[60%] text-center p-4">
                                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                            {{-- deskripsi --}}
                                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                            </p>
                                            {{-- href detail --}}
                                            <button class="btn btn-success mb-3">Beli</button>
                                        </div>
                                    </div>
                                </div>
                                                {{-- card --}}
                <div class="card card-side bg-secondary w-[25%] shadow-xl mx-2 h-full">
                    <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                        <div class="h-1/2 w-full">
                            {{-- image card --}}
                            <img src="{{ url('image/obat.png') }}" alt="obat"
                                class="ml-2 object-contain object-center w-5/6 h-full">
                        </div>
                        <div class="h-2/6 w-full text-center">
                            {{-- judul dan harga barang --}}
                            <h2 class="w-full text-end font-bold text-lg">Panadol RGB 2</h2>
                            <p class="w-full">Rp. 30.000</p>
                        </div>
                    </figure>
                    <div class="card-body w-[60%] text-center p-4">
                        <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                            {{-- deskripsi --}}
                            <p class="w-full h-[70%] text-justify text-sm align-middle">
                                Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                            </p>
                            {{-- href detail --}}
                            <button class="btn btn-success mb-3">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-10 w-full flex flex-row items-center justify-center">
            <div class="h-10 w-3/6 flex flex-row items-center justify-center place-content-stretch p-1 text-primary text-lg">
                <div class="w-[15%] h-full ml-10"><document class="write"> << First </document> </div>
                <div class="w-[15%] h-full ml-2"><document class="write">< Prev</document></div>
                <div class="w-[20%] h-full">1 2 3 4 5</div>
                <div class="w-[15%] h-full"><document class="write">Next ></document></div>
                <div class="w-[15%] h-full"><document class="write">Last >></document></div>
            </div>
        </div>
    </div>
</div>
@endsection
