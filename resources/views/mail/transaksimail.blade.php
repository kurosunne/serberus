<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div
        style="display: flex; flex-direction:column; width:100%; margin-top:2rem; align-items:center; ">
        <div style="width: 50%; align-items:center; border: 4px solid #FFB034; border-radius: 1rem">
            <div style="width: 100%; display:flex; margin-top:2rem; margin-bottom:2rem;">
            <p style="font-size:2rem; font-weight:bold; margin:auto;">Halo, {{ $user->ps_nama }}</p>
            </div>
            <div style="width: 100%;">
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem;">Terima kasih telah melakukan transaksi di <span style="color: #FFB034; font-weight:bold;">Serberus</span></p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:1.5rem; margin-left:2rem;">Berikut adalah detail transaksi yang sudah berhasil terbuat</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem; font-weight:bold">Order ID : {{$hjual->ho_orderId}}</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem; font-weight:bold">Tanggal Transaksi : {{date_format($hjual->created_at, 'd F Y')}}</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem; font-weight:bold">Waktu Transaksi : {{date_format($hjual->created_at, 'H:i:s')}}</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem; font-weight:bold">Jenis Pembayaran : {{strtoupper($hjual->ho_paymentType)}}</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem; font-weight:bold">Status Transaksi : {{$hjual->status == "settlement" ? "Sudah Dibayar" : "Menunggu Pembayaran"}} WIB</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem; font-weight:bold">Nama Pembeli : {{$user->ps_nama}}</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:2rem; font-weight:bold">Alamat Pembeli : {{$user->ps_alamat}}</p>
                <p style="font-size:1.2rem; margin:0px; margin-bottom:1rem; margin-left:2rem; font-weight:bold">Detail Transaksi :</p>

                @foreach ($djual as $key => $item)
                <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:5rem; font-weight:bold;">Barang {{$key+1}}</p>
                    <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:5rem;">Nama Barang : {{$item->Obat->ob_nama}}</p>
                    <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:5rem;">Jumlah Beli : {{$item->do_stok}}</p>
                    <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:5rem;">Harga Satuan : Rp. {{ number_format($item->Obat->ob_harga, 2, ',', '.') }}</p>
                    <p style="font-size:1.2rem; margin:0px; margin-bottom:0.5rem; margin-left:5rem; font-weight:bold;">Subtotal : Rp. {{ number_format(($item->Obat->ob_harga * $item->do_stok), 2, ',', '.')}}</p>
                @endforeach
                <p style="font-size:1.2rem; margin:0px; margin-bottom:2rem; margin-left:2rem; font-weight:bold">Total Transaksi : Rp. {{ number_format(($hjual->ho_grossAmount), 2, ',', '.')}}</p>
                <p style="font-size:1rem; margin:0px; margin-left:1rem; margin-bottom:0.2rem; color:gray">*pesan ini dikirim automatis oleh sistem</p>
            </div>
        </div>
    </div>
</body>

</html>
