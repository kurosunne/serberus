@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')

    <div class="p-[10px] w-full flex">
        <input type="text" placeholder="Cari Nama Rumah Sakit" class="input input-bordered w-full max-w-xs"
            name="searchrumahsakit" />
        <div class="p-[2px]">
            <a href="" class="btn btn-secondary">Search</a>
        </div>
    </div>

    <div class="p-[10px] w-full flex">
        <div class="w-[49%] overflow-auto h-96">
            <table class="table w-full border-solid">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Rumah Sakit</th>
                        <th>Tanggal Daftar</th>
                        <th>Telepon Rumah Sakit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rumahsakit as $key => $rs)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $rs->rs_nama }}</td>
                            <td>{{ date('F j, Y', strtotime($rs->created_at)) }}</td>
                            <td>{{ $rs->rs_telepon ?? 123 }}</td>
                            <td>
                                <a href="" class="btn btn-info">Detail</a>
                                <a href="" class="btn btn-error">Ban</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-[49%] ml-2 overflow-auto shadow-lg">
            <form class="w-full" action="" method="POST">
                @csrf
                <div class="text-center font-bold">
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

            <div class="divider mt-4"></div>

            <form class="w-full mt-4" action="" method="POST">
                @csrf
                <div class="text-center font-bold">
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
                        <button class="btn btn-outline btn-wide">Add Rumah Sakit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ml-2 overflow-auto shadow-lg relative">
    </div>
    </div>
@endsection
