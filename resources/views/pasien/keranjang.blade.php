@extends('layout.setup')

@section('main')
    <div class="h-[92%] w-full flex">
        @extends('pasien.navbar')

        <div class="h-full w-4/6 flex justify-center">
            <div class="w-[95%] mt-12">
                <table class="table w-full text-center">
                    <!-- head -->
                    <thead class="text-base-100">
                        <tr class="font-bold">
                            <th class="bg-secondary">No</th>
                            <th class="bg-secondary">Nama Obat</th>
                            <th class="bg-secondary">Harga Obat</th>
                            <th class="bg-secondary">Jumlah Barang</th>
                            <th class="bg-secondary">Subtotal</th>
                            <th class="bg-secondary">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keranjang as $key => $item)
                            <tr>
                                <td class="font-bold">{{$key+1}}</td>
                                <td>{{$item->ob_nama}}</td>
                                <td>Rp. {{ number_format($item->ob_harga, 2, ',', '.') }}</td>
                                <td><input type="number" onchange="changeValue()" id={{"item".$key}} value="{{$qty[$key]}}" min="1" max="{{$item->ob_stok}}"  class="input input-neutral border border-solid border-neutral"></td>
                                <td id="{{"sub".$key}}">Rp. {{number_format(($item->ob_harga * $qty[$key]), 2, ',', '.')}}</td>
                                <td><a href="{{route('pasien.deleteKeranjang',["key"=>$key])}}" class="btn btn-error">Delete</a></td>
                                <input type="hidden" id="{{"harga".$key}}" value="{{$item->ob_harga}}" />
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="h-full w-2/6 bg-secondary"></div>
    </div>

    <script>
        function changeValue(){
            var count = "<?= count($keranjang); ?>";
            var b = 5;
            for (let i = 0; i < count; i++) {
                document.getElementById("sub"+i).innerHTML = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format((document.getElementById("item"+i).value) * (document.getElementById("harga"+i).value));
            }
        }
    </script>
@endsection
