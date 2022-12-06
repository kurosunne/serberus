@extends('layout.setup')

@section('main')
    <div class="h-full w-full flex justify-center items-start">
        @extends('pasien.navbar')
        <div class="h-[35rem] w-11/12 px-10 flex flex-row items-start justify-start mt-10 p-0">
            <div class="w-[30%] h-full flex flex-col items-center justify-center">
                <div class="h-[40%] w-full  rounded-[15px] border-black flex flex-row items-center justify-center">
                    <div class="h-5/6 flex items-center justify-center pt-5 w-5/6">
                        <img src="{{ url('image/obat.png') }}" alt="obat" class="rounded-full h-full" />
                    </div>
                </div>
                <div class="h-[60%] w-full mt-6 rounded-[15px] border-black flex flex-col p-5" style="border: 4px solid #FFB034">
                    <p class="mb-7 text-2xl font-bold">
                        Deskripsi Barang
                    </p>
                    <p class="text-lg text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore voluptatibus sint aliquam ratione repudiandae corporis laboriosam ea alias voluptas facilis natus explicabo id itaque, ad fuga. Neque, nam est. Nulla?
                    </p>
                </div>
            </div>
            <div class="w-[30%] h-full flex flex-col mx-8 border-black rounded-[15px] p-5" style="border: 4px solid #FFB034">
                <p class="text-2xl mb-3 font-bold">
                    Panadol Hijau
                </p>
                <p class="text-lg mb-6 font-bold">
                    Harga : Rp. 16.000
                </p>
                <div class="text-md flex flex-row h-6">
                    <div class="w-1/4 h-6">
                        Golongan
                    </div>
                    <div class="w-1/2 h-6">
                        : Obat Umum
                    </div>
                </div>
                <div class="text-md flex flex-row h-6">
                    <div class="w-1/4 h-6">
                        Kategori
                    </div>
                    <div class="w-1/2 h-6">
                        : Batuk Pilek
                    </div>
                </div>
                <div class="text-md flex flex-row h-6 mb-6">
                    <div class="w-1/4 h-6">
                        Isi
                    </div>
                    <div class="w-1/2 h-6">
                        : 60 tablet
                    </div>
                </div>
                <p>
                    Komposisi :
                </p>
                <p class="text-justify mb-6">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium omnis cum adipisci quia praesentium neque perspiciatis, assumenda hic consectetur modi ipsa dicta repellat!
                </p>
                <p>
                    Efek Samping :
                </p>
                <p class="text-justify mb-6">
                    lemas, lelah, letih
                </p>
                <p>
                    Manfaat :
                </p>
                <p class="text-justify">
                    Meredakan nyeri sendi, mual, dan sakit kepala
                </p>
            </div>
            <div class="w-[30%] h-full flex flex-col">
                <div class="h-[70%] w-full rounded-[15px] border-black flex flex-col p-5" style="border: 4px solid #FFB034">
                    <div class="flex flex-row w-full h-30">
                        <div class="h-5/6 flex item-center justify-center pt-5 w-2/6">
                            <img src="{{ url('image/small-shop.png') }}" alt="toko" class="h-full" />
                        </div>
                        {{-- deskripsi card --}}
                        <div class="text-start pt-5 pl-2">
                            <h2 class="card-title text-xl font-bold">Toko Obat Murah</h2>
                            <p class="text-lg">Lokasi : Jl.Semangka Rambutan</p>
                        </div>
                    </div>
                    <p class="text-md">Stok Tersisa : 2</p>
                        <p class="text-md">Description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, incidunt commodi, quaerat enim culpa facilis minus beatae eligendi facere numquam sunt, quisquam aliquid architecto</p>
                </div>
                <div class="h-[40%] w-full mt-6 rounded-[15px] border-black flex flex-col p-5" style="border: 4px solid #FFB034">
                    <div class="flex justify-center">
                        <div class="mb-3 w-[21.5rem]">
                          <label for="exampleNumber0" class="form-label inline-block mb-2 text-gray-700 text-center w-full text-center "
                            >Jumlah Barang</label
                          >
                          <input
                            type="number"
                            class="
                              form-control
                              block
                              w-full
                              px-3
                              py-1.5
                              text-base
                              font-normal
                              text-gray-700
                              bg-white bg-clip-padding
                              border border-solid border-gray-300
                              rounded
                              transition
                              ease-in-out
                              m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            "
                            id="exampleNumber0"
                            placeholder="Jumlah Barang"
                          />
                        </div>
                    </div>
                    <div class="w-full h-7 flex flex-row px-1">
                          <div class="text-start h-7 w-1/2">Subtotal</div>
                          <div class="text-end font-bold h-7 w-1/2">Rp. 12.000</div>
                    </div>
                    <div class="btn btn-success"> Masukkan Ke Keranjang</div>
                    </div>
            </div>
        </div>
    </div>
@endsection
