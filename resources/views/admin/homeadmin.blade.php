@extends('layout.setup')

@section('header')
@include('admin.components.navbar')
@endsection

@section('main')
<div class="flex flex-col items-center">
    <div class="text-center font-bold text-2xl  mt-10">
        Laporan Pembelian Obat
    </div>
    <div id="grafik" class="w-full mt-4 ml-auto"></div>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var pendapatan = <?php echo json_encode($total_harga) ?>;
    var bulan = <?php echo json_encode($bulan) ?>;
    Highcharts.chart('grafik',{
        title : {
            text: "Grafik Pendapatan Pembelian Obat"
        },
        xAxis : {
            categories : bulan
        },
        yAxis:{
            title : {
                text : "Nominal Pendapatan Bulanan"
            }
        },
        plotOptions : {
            series : {
                allowPointSelect: true
            },
        },
        series : [
            {
                name: "Nominal Pendapatan",
                data: pendapatan
            }
        ]
    })
</script>
@endsection
