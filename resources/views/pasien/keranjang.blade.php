@extends('layout.setup')

@section('main')
    <div class="h-[92%] w-full flex">
        @extends('pasien.navbar')
        {{-- kiri --}}
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
                                <td class="font-bold">{{ $key + 1 }}</td>
                                <td>{{ $item->ob_nama }}</td>
                                <td>Rp. {{ number_format($item->ob_harga, 2, ',', '.') }}</td>
                                <td><input type="number" onchange="changeValue({{$key}})" id={{ 'item' . $key }}
                                        value="{{ $qty[$key] }}" name="stok" min="1" max="{{ $item->ob_stok }}"
                                        class="input input-neutral border border-solid border-neutral"></td>
                                <td id="{{ 'sub' . $key }}">Rp.
                                    {{ number_format($item->ob_harga * $qty[$key], 2, ',', '.') }}</td>
                                <td class="flex">
                                    <form action="{{route('pasien.updateKeranjang',["key" => $key])}}" method="POST" class="flex justify-center w-full">
                                    @csrf
                                    <button id={{"confirm".$key}} href="{{ route('pasien.deleteKeranjang', ['key' => $key]) }}"
                                        class="btn btn-success mr-4" disabled>Confirm</button>
                                    <input type="hidden" value="{{$qty[$key]}}" name="jml" id={{"jml".$key}}>
                                    <a href="{{ route('pasien.deleteKeranjang', ['key' => $key]) }}"
                                        class="btn btn-error">Delete</a>
                                    </form>

                                </td>
                                <input type="hidden" id="{{ 'harga' . $key }}" value="{{ $item->ob_harga }}" />
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- kanan --}}
        <div class="h-full w-2/6">
            <form action="" id="submit_form" method="POST">
                @csrf
                <input type="hidden" name="json" id="json_callback">
            </form>
            <div class="w-[95%] flex flex-col items-center">
                <div class="w-full h-[30rem] rounded mt-12" style="border: 4px solid #FFB034">tempat map </div>
                <div class="w-full mt-4">
                    <p class="text-2xl font-bold" id="total">Total : Rp
                        {{ number_format($total, 2, ',', '.') }}</p>
                    <button id="payBut" {{$snapToken==null ? "disabled" : ""}} class="btn btn-success text-white w-full mt-4">Bayar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeValue(key) {
            var count = "<?= count($keranjang) ?>";
            var total = 0;
            for (let i = 0; i < count; i++) {
                document.getElementById("sub" + i).innerHTML = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format((document.getElementById("item" + i).value) * (document.getElementById("harga" + i).value));
                total += (document.getElementById("item" + i).value) * (document.getElementById("harga" + i).value);
            }
            document.getElementById("confirm"+key).disabled = false;
            document.getElementById("payBut").disabled = true;
            document.getElementById("jml"+key).value = document.getElementById("item" + key).value;
            document.getElementById("total").innerHTML = "Total : " + new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(total);
        }

        function sendForm(result){
            document.getElementById("json_callback").value = JSON.stringify(result);
            document.getElementById("submit_form").submit();
        }

        document.getElementById("payBut").addEventListener("click", (event) => {
                var payButton = document.getElementById('payBut');
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        alert("payment success!");
                        sendForm(result)
                    },
                    onPending: function(result) {
                        alert("wating your payment!");
                        sendForm(result)
                    },
                    onError: function(result) {
                        alert("payment failed!");
                        sendForm(result)
                    },
                    onClose: function() {
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
    </script>
@endsection
