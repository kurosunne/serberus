@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')
    <div class="p-[10px] w-full flex">
        <input type="text" placeholder="Cari Nama Dokter" class="input input-bordered w-full max-w-xs" name="searchdokter" />
        <div class="p-[2px]">
            <a href="" class="btn btn-secondary">Search</a>
        </div>
    </div>
    <div class="p-[10px] w-full flex">
        <div class="w-[49%] overflow-auto h-96">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="bg-accent">No.</th>
                        <th class="bg-accent">Nama Dokter</th>
                        <th class="bg-accent">Tanggal Daftar</th>
                        <th class="bg-accent">Email Dokter</th>
                        <th class="bg-accent">No. Telpon</th>
                        <th class="bg-accent">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokter as $dk)
                        <tr>
                            <td>{{ $dk->dk_id }}</td>
                            <td>{{ $dk->dk_nama }}</td>
                            <td>{{ date('F j, Y', strtotime($dk->created_at)) }}</td>
                            <td>{{ $dk->dk_email }}</td>
                            <td>{{ $dk->dk_telp }}</td>
                            <td>
                                <a href="" class="btn btn-info">Detail</a>
                                @if ($dk->trashed())
                                    <a href="{{ url("admin/deletedokter/$dk->dk_id") }}" class="btn btn-success">Unban</a>
                                @else
                                    <a href="{{ url("admin/deletedokter/$dk->dk_id") }}" class="btn btn-error">Ban</a>
                                @endif
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
                    Detail Dokter
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama Dokter
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="namadokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-telepon">
                            Telepon
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-telepon" type="text" name="telepondokter">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-alamat">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="emaildokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Status
                        </label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input type="radio" name="statusdokter" class="radio" />
                                <label for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input type="radio" name="statusdokter" class="radio" />
                                <label for="inline-radio"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Aktif</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button class="btn btn-error btn-wide">Delete Dokter</button>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button class="btn btn-outline btn-wide">Edit Dokter</button>
                    </div>
                </div>

            </form>

            <div class="divider mt-4"></div>

            <form class="w-full" action="{{ route('admin.adddokter') }}" method="POST">
                @csrf
                <div class="text-center font-bold">
                    Tambah Dokter
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="createnamadokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createemaildokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Telepon
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createtelepondokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Rumah Sakit
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createrumahsakitdokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-status">
                            Password
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-secondary rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="password" name="createpasswordokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-status">
                            Tipe Spesialis
                        </label>
                        <select class="select select-secondary block w-full max-w-xs" name="createspesialisdokter">
                            <option value="1">Umum</option>
                            <option value="2">Anak</option>
                            <option value="3">Mata</option>
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-status">
                            Sertifikat
                        </label>
                        <input class="file-input file-input-bordered file-input-secondary w-full max-w-xs" id="grid-email"
                            type="file" name="createsertifikatdokter">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <button class="btn btn-outline btn-wide">Add Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
