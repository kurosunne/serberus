@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')
    <div class="w-full p-2 flex">
        <form class="w-2/3 mt-8" action="{{ $editId==-1 ? route('admin.addrumahsakit') : route('admin.editrumahsakit',["editId" => $editId]) }}" method="POST">
            @csrf
            <div class="text-center text-2xl font-bold">
                {{ $editId==-1 ? "Tambah Rumah Sakit" : "Edit Rumah Sakit" }}
            </div>
            <br>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                        Nama
                        @error('createnamarumahsakit')
                            <span class="text-error">({{ $message }})</span>
                        @enderror
                    </label>
                    <input
                        class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-nama" type="text" name="createnamarumahsakit"
                        value="{{ $editId==-1 ? old('createnamarumahsakit') : $rumahSakitEdit->rs_nama }}">
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
                        value="{{ $editId==-1 ? old('createalamatrumahsakit') : $rumahSakitEdit->rs_alamat}}">
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
                        value="{{ $editId==-1 ? old('createteleponrumahsakit') : $rumahSakitEdit->rs_telp}}">
                </div>
            </div>
            <div class="flex flex-wrap mb-3">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <button class="btn btn-wide btn-accent w-full text-white">{{ $editId==-1 ? "Tambah Rumah Sakit" : "Edit Rumah Sakit" }}</button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.rumahsakit') }}" class="p-[10px] w-1/2 flex mt-auto justify-end">
            <input type="text" placeholder="Cari Nama Rumah Sakit" class="input input-bordered w-full max-w-lg bg-white"
                name="searchrumahsakit"/>
            <button class="p-[2px] btn btn-secondary w-full w-32 ml-2">
                Search
            </button>
        </form>
    </div>

    <div class="p-[10px] w-full">
        <div class="w-full overflow-auto h-full">
            <table class="table w-full border-solid ">
                <thead class="text-white">
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
                                <a href="{{route('admin.rumahsakit',["editId"=>$rs->rs_id])}}" class="btn btn-secondary text-white" {{ $rs->trashed() ? "disabled" : "" }} >Edit</a>
                                @if ($rs->trashed())
                                    <a href="{{ url("admin/rumahsakit/$rs->rs_id/delete") }}"
                                        class="btn btn-success">Unban</a>
                                @else
                                    <a href="{{ url("admin/rumahsakit/$rs->rs_id/delete") }}" class="btn btn-error">Ban</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
    <div class="ml-2 overflow-auto shadow-lg relative">
    </div>
    </div>
@endsection
