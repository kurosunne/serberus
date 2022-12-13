@extends('layout.setup')

@section('main')
    <div class="h-full w-full flex justify-center items-start">
        @extends('pasien.navbar')
        <div class="h-[75%] w-11/12 px-10 flex flex-row items-start justify-center mt-16 p-0">
            <div class="w-[35%] h-full flex flex-col items-center justify-center">
                <div class="h-[40%] w-full  rounded-[15px] border-black flex flex-row items-center justify-center">
                    <div class="h-5/6 flex items-center justify-center pt-5 w-5/6">
                        <img src="{{ url('image/obat.png') }}" alt="obat" class="rounded-full h-full" />
                    </div>
                </div>
                <div class="h-[60%] w-full mt-6 rounded-[15px] border-black flex flex-col p-5"
                    style="border: 4px solid #FFB034">
                    <form method="POST" action="{{route('pasien.beliobat',["id" => $obat->ob_id,])}}">
                        @csrf
                        <div class="flex justify-center">
                            <div class="mb-3 w-full max-w-md">
                                <label for="exampleNumber0"
                                    class="form-label inline-block mb-2 text-gray-700 text-center w-full text-xl font-bold text-center my-3">Jumlah
                                    Barang</label>
                                <input type="number"
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
                              mt-3
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                              input input-primary
                            "
                                    id="exampleNumber0" name="stok" placeholder="Jumlah Barang" max="{{$obat->ob_stok}}" min="1" value="1" onchange="changeValue()"/>
                            </div>
                        </div>
                        <div class="w-full h-7 mt-3 flex flex-row px-1 justify-center">
                            <div class="flex w-full max-w-md">
                                <div class="text-start h-7 mr-10">Subtotal</div>
                                <div id="subtotal" class="text-end font-bold h-7">Rp. {{ number_format($obat->ob_harga, 2, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="mt-2 w-full flex justify-center"><button class="btn btn-success w-full max-w-md">Masukkan Ke Keranjang</button> </div>
                    </form>
                </div>
            </div>
            <div class="w-[35%] h-full flex flex-col ml-8 border-black rounded-[15px] p-5"
                style="border: 4px solid #FFB034">
                <p class="text-2xl mb-3 font-bold">
                    {{ $obat->ob_nama }}
                </p>
                <p class="text-lg mb-3 font-bold">
                    Harga : Rp. {{ number_format($obat->ob_harga, 2, ',', '.') }}
                </p>
                <p class="text-lg mb-3 font-bold">
                    Stok Barang : {{ $obat->ob_stok }}
                </p>
                <p class="text-lg mb-3 font-bold">
                    Tipe Obat : {{ $obat->TipeObat->to_nama }}
                </p>
                <p class="mb-5 text-2xl font-bold">
                    Deskripsi Barang
                </p>
                <p class="text-lg text-justify">
                    {{ $obat->ob_deskripsi }}
                </p>
            </div>
        </div>
    </div>

    <script>
        function changeValue(){
            var harga = parseInt("<?php echo $obat->ob_harga; ?>");
            var jum = document.getElementById("exampleNumber0").value;
            var tot = harga * jum;
            document.getElementById("subtotal").innerHTML = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(tot);;
        }
    </script>
@endsection
