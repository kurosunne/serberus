@extends('layout.setup')

@section('main')
    <div class="h-[55rem] w-full flex justify-center items-start mb-10">
        @extends('pasien.navbar')
        <div class="h-[95%] w-11/12 flex flex-row items-start justify-start mt-6">
            <div class="h-full w-4/6 mr-3">
                <div class="w-full h-3/6 rounded-[15px] flex flex-col justify-center item-start"
                    style="border: 4px solid #FFB034">
                    <div class="h-10 w-full text-center mt-1 mb-1">
                        <p class="font-bold">
                            Unggulan Kami
                        </p>
                    </div>
                    {{-- carosel --}}
                    <div class="carousel w-full h-5/6">
                        {{-- page 1 carosel --}}
                        <div id="item1" class="carousel-item relative w-full">
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 1</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 2</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 3</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#item3" class="btn btn-circle">❮</a>
                                <a href="#item2" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        {{-- carosel page 2 --}}
                        <div id="item2" class="carousel-item relative w-full">
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 4</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 5</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 6</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#item1" class="btn btn-circle">❮</a>
                                <a href="#item3" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        {{-- page 3 carosel --}}
                        <div id="item3" class="carousel-item relative w-full">
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 7</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 8</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card w-[30%] bg-secondary shadow-xl mx-4 ml-8">
                                {{-- foto card --}}
                                <div class="h-2/6 flex item-center justify-center pt-3">
                                    <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                                </div>
                                {{-- deskripsi card --}}
                                <div class="card-body items-center text-center">
                                    <h2 class="card-title">Dr. Paling Hebat 9</h2>
                                    <p>Spesialis paling spesial selama 3 tahun</p>
                                    {{-- button href --}}
                                    <div class="card-actions">
                                        <button class="btn btn-primary">Detail</button>
                                    </div>
                                </div>
                            </div>
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
                        <p class="font-bold">
                            Obat Terlaris
                        </p>
                    </div>
                    {{-- carosel --}}
                    <div class="carousel w-full h-[80%]">
                        {{-- page 1 carosel --}}
                        <div id="obat1" class="carousel-item relative w-full">
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 1</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 2</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 3</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        {{-- carosel page 2 --}}
                        <div id="obat2" class="carousel-item relative w-full">
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 4</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 5</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 6</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
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
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 7</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
                            {{-- card --}}
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 8</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
                            {{-- card --}}
                            <div class="card card-side bg-secondary w-[30%] shadow-xl mx-4 ml-8">
                                <figure class="w-[40%] h-full flex flex-col item-center justify-center">
                                    <div class="h-1/2 w-full">
                                        {{-- image card --}}
                                        <img src="{{ url('image/obat.png') }}" alt="obat"
                                            class="ml-2 object-contain object-center w-5/6 h-full">
                                    </div>
                                    <div class="h-2/6 w-full text-center">
                                        {{-- judul dan harga barang --}}
                                        <h2 class="w-full text-center font-bold text-lg">Panadol RGB 9</h2>
                                        <p class="w-full">Rp. 30.000</p>
                                    </div>
                                </figure>
                                <div class="card-body w-[60%] text-center p-4">
                                    <div class="w-full h-full bg-slate-400 rounded-lg p-2 justify-center">
                                        {{-- deskripsi --}}
                                        <p class="w-full h-[80%] text-justify text-sm align-middle">
                                            Obat untuk meredakan batuk, pilek, hingga covid dalam satu kemasan
                                        </p>
                                        {{-- href detail --}}
                                        <button class="btn btn-success mb-3">Beli</button>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-3 right-3 top-1/2">
                                <a href="#obat3" class="btn btn-circle">❮</a>
                                <a href="#obat2" class="btn btn-circle">❯</a>
                            </div>
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
                            <p class="font-bold font-lg text-secondary">See More...</p>
                        </div>
                    </div>
                    {{-- card --}}
                    <div class="w-full h-[25%] bg-secondary mt-3 flex p-2">
                        <div class="h-full w-[20%]">
                            <img src="{{url("image/avatar.jpg")}}" alt="" class="rounded-full">
                        </div>
                        <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                            <p class="text-lg font-bold mt-3">Dr. Mister Doktor</p>
                            <p class="text-sm mb-3">Tanggal Konsultasi 12/20/2022</p>
                        </div>
                        <div class="h-full w-[20%] flex flex-col item-center justify-center">
                            <div class="btn btn-success">Detail</div>
                        </div>
                    </div>
                    {{-- card --}}
                    <div class="w-full h-[25%] bg-secondary mt-3 flex p-2">
                        <div class="h-full w-[20%]">
                            <img src="{{url("image/avatar.jpg")}}" alt="" class="rounded-full">
                        </div>
                        <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                            <p class="text-lg font-bold mt-3">Dr. Mister Doktor</p>
                            <p class="text-sm mb-3">Tanggal Konsultasi 12/20/2022</p>
                        </div>
                        <div class="h-full w-[20%] flex flex-col item-center justify-center">
                            <div class="btn btn-success">Detail</div>
                        </div>
                    </div>
                    {{-- card --}}
                    <div class="w-full h-[25%] bg-secondary mt-3 flex p-2">
                        <div class="h-full w-[20%]">
                            <img src="{{url("image/avatar.jpg")}}" alt="" class="rounded-full">
                        </div>
                        <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                            <p class="text-lg font-bold mt-3">Dr. Mister Doktor</p>
                            <p class="text-sm mb-3">Tanggal Konsultasi 12/20/2022</p>
                        </div>
                        <div class="h-full w-[20%] flex flex-col item-center justify-center">
                            <div class="btn btn-success">Detail</div>
                        </div>
                    </div>
                </div>
                <div class="w-full h-3/6 rounded-[15px] flex flex-col items-center p-3 mt-6" style="border: 4px solid #FFB034">
                    <div class="w-full h-[15%] flex">
                        <div class="h-full w-1/2 flex items-center justify-start">
                            <p class="font-bold font-lg">Riwayat Transaksi Obat</p>
                        </div>
                        <div class="h-full w-1/2 flex items-center justify-end">
                            {{-- route menuju riwayat --}}
                            <p class="font-bold font-lg text-secondary">See More...</p>
                        </div>
                    </div>
                    {{-- card --}}
                    <div class="w-full h-[25%] bg-secondary mt-3 flex p-2">
                        <div class="h-full w-[20%]">
                            <img src="{{url("image/obat.png")}}" alt="obat" class="rounded-full object-contain object-center w-5/6 h-full">
                        </div>
                        <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                            <p class="text-lg font-bold mt-3">Panadol RGB</p>
                            <p class="text-sm mb-3">Tanggal Beli 12/20/2022</p>
                        </div>
                        <div class="h-full w-[20%] flex flex-col item-center justify-center">
                            <div class="btn btn-success">Detail</div>
                        </div>
                    </div>
                                        {{-- card --}}
                                        <div class="w-full h-[25%] bg-secondary mt-3 flex p-2">
                                            <div class="h-full w-[20%]">
                                                <img src="{{url("image/obat.png")}}" alt="obat" class="rounded-full object-contain object-center w-5/6 h-full">
                                            </div>
                                            <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                                                <p class="text-lg font-bold mt-3">Panadol RGB</p>
                                                <p class="text-sm mb-3">Tanggal Beli 12/20/2022</p>
                                            </div>
                                            <div class="h-full w-[20%] flex flex-col item-center justify-center">
                                                <div class="btn btn-success">Detail</div>
                                            </div>
                                        </div>
                                                            {{-- card --}}
                    <div class="w-full h-[25%] bg-secondary mt-3 flex p-2">
                        <div class="h-full w-[20%]">
                            <img src="{{url("image/obat.png")}}" alt="obat" class="rounded-full object-contain object-center w-5/6 h-full">
                        </div>
                        <div class="h-full w-[50%] flex-col items-start justify-start mx-3">
                            <p class="text-lg font-bold mt-3">Panadol RGB</p>
                            <p class="text-sm mb-3">Tanggal Beli 12/20/2022</p>
                        </div>
                        <div class="h-full w-[20%] flex flex-col item-center justify-center">
                            <div class="btn btn-success">Detail</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
