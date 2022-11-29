@extends('layout.setupadmin')

@section('header')
    @include('layout.navbar')
@endsection

@section('main')
    <div class="p-[10px] w-full flex">
        <div class="w-[49%] overflow-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Rumah Sakit</th>
                        <th>Alamat Rumah Sakit</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rumahsakit as $rs)
                        <tr>
                            <td>{{ $rs->rs_id }}</td>
                            <td>{{ $rs->rs_nama }}</td>
                            <td>{{ $rs->rs_alamat }}</td>
                            <td>000000</td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-[49%] ml-2 overflow-auto">
            <form class="w-full" action="" method="POST">
                @csrf
                <div class="text">
                    Detail Rumah Sakit
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="namarumahsakit">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-telepon">
                            Telepon
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-telepon" type="text" name="teleponrumahsakit">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-alamat">
                            Alamat
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="alamatrumahsakit">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Status
                        </label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input type="radio" name="statusrumahsakit" class="radio" />
                                <label for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input type="radio" name="statusrumahsakit" class="radio" />
                                <label for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak
                                    Aktif</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button class="btn btn-error btn-wide">Delete Rumah Sakit</button>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button class="btn btn-outline btn-wide">Edit Rumah Sakit</button>
                    </div>
                </div>
            </form>

            <form class="w-full max-w-lg" action="" method="POST">
                @csrf
                <div class="text">
                    Tambah Rumah Sakit
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="createnamarumahsakit">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Alamat
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createalamatrumahsakit">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Telepon
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createteleponrumahsakit">
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/4"></div>
                    <div class="w-full md:w-2/4 px-4 mb-6 md:mb-0">
                        <button class="btn btn-outline btn-wide">Add Account</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    </div>
@endsection

<style>
    .initable {
        top: 100px;
    }

    .inidetailrumahsakit {
        border-radius: 25px;
        border: 1px solid #e0cdcd;
        padding: 10px;
    }

    .inicreaterumahsakit {
        border-radius: 25px;
        position: absolute;
        right: 100px;
        border: 1px solid #e0cdcd;
        padding: 10px;
        top: 450px;
    }

    .text {
        text-align: center;
        font-weight: bold;
    }
</style>
