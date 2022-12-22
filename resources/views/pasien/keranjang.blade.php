@extends('layout.setup')

@section('links')
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
@endsection

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
                <input type="text" name="alamat" id="map-address" class="w-full input input-bordered input-primary mt-5">
            </form>
            <div class="w-[95%] flex flex-col items-center">
                <input type="hidden" id="map-location">
                <div class="w-full h-[30rem] rounded mt-12" style="border: 4px solid #FFB034" id="map"></div>
                <div class="w-full mt-4">
                    <p class="text-2xl font-bold" id="total">Total : Rp
                        {{ number_format($total, 2, ',', '.') }}</p>
                    <button id="payBut" {{$snapToken==null ? "disabled" : ""}} class="btn btn-success text-white w-full mt-4">Bayar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var platform = new H.service.Platform({
            apikey: "{{ env('HERE_API_KEY') }}"
        });
        var defaultLayers  = platform.createDefaultLayers()

        var map = new H.Map(
            document.getElementById("map"),
            defaultLayers.vector.normal.map,
            {
                center: {
                    lat:7.291306,
                    lng:112.758829
                },
                zoom: 4,
                pixelRatio: 1
            }
        )
        window.addEventListener('resize', () => map.getViewPort().resize())

        var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map))

        var ui = H.ui.UI.createDefault(map, defaultLayers)

        window.onload = () => {
            map.setCenter({
                lat:7.291306,
                lng:112.758829
            })
            map.setZoom(10)
        }

        setUpClickListener(map);

        let activeMarker = null
        var svgIcon = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
        id="Capa_1" x="0px" y="0px" width="32" height="32" viewBox="0 0 263.335 263.335"
        style="enable-background:new 0 0 263.335 263.335;" xml:space="preserve">
        <g>
        <g xmlns="http://www.w3.org/2000/svg">
        <path d="M40.479,159.021c21.032,39.992,49.879,74.22,85.732,101.756c0.656,0.747,1.473,1.382,2.394,1.839
        c0.838-0.396,1.57-0.962,2.178-1.647c80.218-61.433,95.861-125.824,96.44-128.34c2.366-9.017,3.57-18.055,3.57-26.864
        C237.389,47.429,189.957,0,131.665,0C73.369,0,25.946,47.424,25.946,105.723c0,8.636,1.148,17.469,3.412,26.28" fill="red"/>
        </g>
        </g></svg>`
        let markerIcon = new H.map.Icon(svgIcon)

        function setUpClickListener(map) {
            map.addEventListener('tap', function (evt) {
                var coord = map.screenToGeo(evt.currentPointer.viewportX,
                        evt.currentPointer.viewportY);
                console.log(`Clicked at : ${coord.lat}${(coord.lat > 0) ? 'N' : 'S'} ${coord.lng}${(coord.lng > 0) ? 'E' : 'W'}`);
                if(activeMarker != null){
                    map.removeObject(activeMarker)
                }
                activeMarker = new H.map.Marker({
                    lat:coord.lat,
                    lng:coord.lng
                }, {
                    icon: markerIcon
                })
                let geoCoord = `${coord.lat},${coord.lng}`
                console.log(geoCoord)
                document.getElementById("map-location").value= geoCoord
                const xhr = new XMLHttpRequest();
                xhr.onload = function(){
                    console.log(this)
                    let res = JSON.parse(this.responseText)
                    document.getElementById("map-address").value = res.items[0].address.label
                }
                xhr.open("GET", `https://revgeocode.search.hereapi.com/v1/revgeocode?at=${geoCoord}&lang=en-US&apiKey={{ env('HERE_API_KEY') }}`)
                xhr.send();
                map.addObject(activeMarker)
            });
        }
    </script>
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
