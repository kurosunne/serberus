@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')
    <div class="p-[10px] w-full flex">
        <input type="text" placeholder="Cari Nama Rumah Sakit" class="input input-bordered w-full max-w-lg"
            name="searchrumahsakit" />
        <div class="p-[2px]">
            <a href="" class="btn btn-secondary ml-2">Search</a>
        </div>
    </div>

    <div class="p-[10px] w-full flex">
        <div class="w-[60%] overflow-auto h-full">
            <table class="table w-full border-solid">
                <thead>
                    <tr>
                        <th class="bg-accent">No.</th>
                        <th class="bg-accent">Nama Rumah Sakit</th>
                        <th class="bg-accent">Alamat Rumah Sakit</th>
                        <th class="bg-accent">Tanggal Daftar</th>
                        <th class="bg-accent">Telepon Rumah Sakit</th>
                        <th class="bg-accent">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rumahsakit as $key => $rs)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $rs->rs_nama }}</td>
                            <td>{{ $rs->rs_alamat }}</td>
                            <td>{{ date('F j, Y', strtotime($rs->created_at)) }}</td>
                            <td>{{ $rs->rs_telp }}</td>
                            <td>
                                <a href="" class="btn btn-secondary text-white">Edit</a>
                                @if ($rs->trashed())
                                    <a href="{{ url("admin/deleterumahsakit/$rs->rs_id") }}"
                                        class="btn btn-success">Unban</a>
                                @else
                                    <a href="{{ url("admin/deleterumahsakit/$rs->rs_id") }}" class="btn btn-error">Ban</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-[40%] h-full p-2">
            <form class="w-full" action="" method="POST">
                @csrf
                <div class="text-center font-bold">
                    Edit Rumah Sakit
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="namarumahsakit">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-telepon">
                            Telepon
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-telepon" type="text" name="teleponrumahsakit">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-alamat">
                            Alamat
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="alamatrumahsakit">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Status
                        </label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input type="radio" name="statusrumahsakit" class="radio radio-accent" />
                                <label for="inline-radio" class="ml-2 text-sm font-medium">Aktif</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input type="radio" name="statusrumahsakit" class="radio radio-accent" />
                                <label for="inline-radio" class="ml-2 text-sm font-medium">Tidak
                                    Aktif</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap w-full mb-3">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <button class="btn btn-wide btn-secondary text-white w-full" {{$editId==-1 ? "disabled" : ""}}>Edit Rumah Sakit</button>
                    </div>
                </div>
            </form>

            <div class="divider mt-12"></div>

            <form class="w-full mt-12" action="{{ route('admin.addrumahsakit') }}" method="POST">
                @csrf
                <div class="text-center font-bold">
                    Tambah Rumah Sakit
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                            @error('createnamarumahsakit')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="createnamarumahsakit"
                            value="{{ old('createnamarumahsakit') }}"">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Alamat
                            @error('createalamatrumahsakit')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createalamatrumahsakit"
                            value="{{ old('createalamatrumahsakit') }}"">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Telepon
                            @error('createteleponrumahsakit')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createteleponrumahsakit"
                            value="{{ old('createteleponrumahsakit') }}">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <button class="btn btn-wide btn-accent w-full text-white">Add Rumah Sakit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="ml-2 overflow-auto shadow-lg relative">
    </div>
    </div>
@endsection
