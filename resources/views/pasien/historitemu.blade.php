@extends('layout.setup')

@section('main')
<div class="h-full w-full flex justify-center items-start">
    @extends('pasien.navbar')
    <div class="h-4/5 w-11/12 flex flex-col items-start justify-start mt-10 p-0">
        <div class="h-10 w-full m-0 flex flex-row m-0">
            <div class="h-full w-4/12 flex flex-col justify-center mr-9">
                <div class="w-full h-full flex items-center">
                    <div class=" w-5/12 max-w-md text-xl text-primary">Filter Dengan</div>
                    <select name="rs" id="rs" class="input input-bordered input-primary w-1/3 h-5/6 max-w-md mt-2">
                        <option value="dumi">Dokter</option>
                        <option value="dumi">Perawat</option>
                    </select>
                    @error('rs')
                        <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="h-full w-6/12 flex flex-col justify-center">
                <div class="w-full h-full flex items-center justify-center">
                    <div class="btn btn-primary ml-10 mr-3"><a href="{{route('pasien.historitemu')}}">Riwayat Temu</a></div>
                    <div class=" text-black btn btn-secondary ml-3"> <p class="text-white"> <a href="{{route('pasien.historiobat')}}">Riwayat Obat </a> </p></div>
                </div>
            </div>
            <div class="h-full w-5/12 flex flex-row items-center justify-end">
                <div class="max-w-md text-xl text-primary w-1/3">Sortir Dengan</div>
                <select name="rs" id="rs" class="input input-bordered input-primary h-5/6 max-w-md mt-2 w-1/4">
                    <option value="dumi">Alfabetikal A-Z</option>
                    <option value="dumi">Alfabetikal Z-A</option>
                    <option value="dumi">Tanggal</option>
                </select>
                @error('rs')
                    <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="h-64 w-full">
            <div class="overflow-x-auto mt-10">
                <table class="table w-full text-center">
                  <!-- head -->
                  <thead class="text-base-100">
                    <tr>
                      <th class="bg-secondary">No</th>
                      <th class="bg-secondary">Tanggal / Jam</th>
                      <th class="bg-secondary">Nama Dokter</th>
                      <th class="bg-secondary">No Telp Dokter</th>
                      <th class="bg-secondary">Status</th>
                      <th class="bg-secondary">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr>
                      <th>1</th>
                      <td>13 OKtober 2022 / 08:00 WIB</td>
                      <td>Ivan Linhart Jayapranata</td>
                      <td>083083083083</td>
                      <td>Aktif</td>
                      <td><div class="btn btn-success"> Detail</div>
                        <div class="btn btn-accent ml-5"> Delete</div>
                      </td>
                    </tr>
                    <!-- row 2 -->
                    <tr class="bg-primary">
                        <th class="bg-primary">2</th>
                        <td class="bg-primary">13 OKtober 2022 / 08:00 WIB</td>
                        <td class="bg-primary">Ivan Linhart Jayapranata</td>
                        <td class="bg-primary">083083083083</td>
                        <td class="bg-primary">Aktif</td>
                        <td class="bg-primary"><div class="btn btn-success"> Detail</div>
                            <div class="btn btn-accent ml-5"> Delete</div>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                        <th>3</th>
                        <td>13 OKtober 2022 / 08:00 WIB</td>
                        <td>Ivan Linhart Jayapranata</td>
                        <td>083083083083</td>
                        <td>Aktif</td>
                        <td><div class="btn btn-success"> Detail</div>
                            <div class="btn btn-accent ml-5"> Delete</div>

                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
@endsection
