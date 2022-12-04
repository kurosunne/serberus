@extends('layout.setup')

@section('main')
    <div class="h-full w-full flex justify-center items-start">
        @extends('pasien.navbar')
        <div class="h-[50rem] w-11/12 px-10 flex flex-row items-start justify-start mt-10 p-0">
            <div class="w-[30%] h-full flex flex-col">
                <div class="h-[20%] w-full  rounded-[15px] border-black flex flex-row" style="border: 4px solid #FFB034">
                    <div class="h-5/6 flex item-center justify-center pt-5 w-2/6">
                        <img src="{{ url('image/avatar.jpg') }}" alt="Dokter" class="rounded-full h-full" />
                    </div>
                    {{-- deskripsi card --}}
                    <div class="text-start pt-7 pl-2">
                        <h2 class="card-title text-xl font-bold">Dr. Paling Tahu</h2>
                        <p class="text-lg">Cenayang@gmail.com</p>
                        <p class="text-lg">083-823-987-231</p>
                    </div>
                </div>
                <div class="h-[70%] w-full bg-secondary mt-6 rounded-[15px] flex-col flex p-5">
                    <div class="h-[10%] w-full">
                        <h1 class="text-2xl font-bold text-base-100">Pengalaman Kerja</h1>
                    </div>
                    <div class="h-[20%] w-full flex-row flex">
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold"><document class="write">(2002-2010)</document></p>
                            <p>RSUD Karya Bakti</p>
                        </div>
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold">Dokter Spesialis Bedah</p>
                            <p>Dr. Paling Tahu sudah menangani 800 kasus operasi patah tulang</p>
                        </div>
                    </div>
                    <div class="h-[20%] w-full flex-row flex mt-4">
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold"><document class="write">(2002-2010)</document></p>
                            <p>RSUD Karya Bakti</p>
                        </div>
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold">Dokter Spesialis Bedah</p>
                            <p>Dr. Paling Tahu sudah menangani 800 kasus operasi patah tulang</p>
                        </div>
                    </div>
                    <div class="h-[20%] w-full flex-row flex mt-4">
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold"><document class="write">(2002-2010)</document></p>
                            <p>RSUD Karya Bakti</p>
                        </div>
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold">Dokter Spesialis Bedah</p>
                            <p>Dr. Paling Tahu sudah menangani 800 kasus operasi patah tulang</p>
                        </div>
                    </div>
                    <div class="h-[20%] w-full flex-row flex mt-4">
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold"><document class="write">(2002-2010)</document></p>
                            <p>RSUD Karya Bakti</p>
                        </div>
                        <div class="w-[50%] h-full text-base-100">
                            <p class="font-bold">Dokter Spesialis Bedah</p>
                            <p>Dr. Paling Tahu sudah menangani 800 kasus operasi patah tulang</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-[65%] h-full flex flex-col ml-6">
                <div class="h-[40%] w-full rounded-[15px] flex flex-row">
                    <div class="h-full w-[48%] rounded-[15px] border-black p-4" style="border: 4px solid #FFB034">
                        <div class="h-10 w-full text-center mb-1">
                            <p class="font-bold text-lg">
                                Jadwal Praktek
                            </p>
                        </div>
                        <div class="">
                            {{-- bisa dibuat bentuk lain formatnya --}}
                            <div class="text-start text-lg font-sans flex flex-row">
                                <div class="w-3/6 h-5/6">
                                        Hari <br>
                                        Jam Praktek <br>
                                        Senin - Jumat <br>
                                        Sabtu - Minggu

                                </div>
                                <div class="w-3/6 h-5/6">
                                        : Senin - Sabtu <br>
                                        : <br>
                                        : 09:00 - 20:00 <br>
                                        : 9:00 - 16:00
                                </div>
                            </div>
                        </div>
                    </div>
                        <form method="POST" class="h-full w-[49%]  rounded-[15px] ml-6 border-black p-3" style="border: 4px solid #FFB034">
                            @csrf
                            <p class="text-lg font-bold text-center">Buat Janji Temu</p>
                            <div class=" w-full text-sm mt-3">Pilih Tanggal</div>
                            <input type="date" name="tanggal" value="{{ old('tanggal') }}" placeholder="pilih tanggal"
                                class="input input-bordered input-primary w-full max-w-md mt-2" />
                            @error('username')
                                <div class=" w-full text-xl text-error mt-2">{{ $message }}</div>
                            @enderror
                            <div class=" w-full max-w-md text-sm mt-3">Pilih Jam</div>
                            {{-- sesuai dengan dokter ngesetting apa saja yang aktif --}}
                            <select name="jam" id="jam"
                                class="input input-bordered input-primary w-full max-w-md mt-2">
                                <option value="10:00">10:00-12:00</option>
                                <option value="12:00">12:00-14:00</option>
                            </select>
                            @error('password')
                                <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-primary w-full max-w-md mt-8 text-base-100">Buat Janji</button>
                        </form>
                </div>
                <div class="h-[50%] w-full  mt-6 rounded-[15px] border-black" style="border: 4px solid #FFB034">
                    <div class="h-8 w-full text-center mt-1 mb-1">
                        <p class="font-bold">
                            Dokter Lainnya
                        </p>
                    </div>
                    {{-- carosel --}}
                    <div class="carousel w-full h-[80%]">
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
            </div>
        </div>
    </div>
@endsection
