@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')
    <div class="p-[10px] w-full flex">
        <div class="w-2/3 mt-8">
            <form class="w-full" action="{{ $editId==-1 ? route('admin.adddokter') : route('admin.editdokter',["editId" => $editId]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-center font-bold text-2xl">
                    {{ $editId == -1 ? 'Tambah Dokter' : 'Edit Dokter' }}
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full {{ $editId == -1 ? 'md:w-full' : 'md:w-1/2' }} px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                            @error('createnamadokter')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="createnamadokter"
                            value="{{ $editId == -1 ? old('createnamadokter') : $dokterEdit->dk_nama }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Email
                            @error('createemaildokter')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createemaildokter"
                            value="{{ $editId == -1 ? old('createemaildokter') : $dokterEdit->dk_email }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Telepon
                            @error('createtelepondokter')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createtelepondokter"
                            value="{{ $editId == -1 ? old('createtelepondokter') : $dokterEdit->dk_telp }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Rumah Sakit
                        </label>
                        <select class="select block w-full bg-white" name="createrumahsakitdokter">
                            @foreach ($rumahSakit as $item)
                                <option value="{{ $item->rs_id }}"
                                    {{ $editId == -1 ? ($item->rs_id == old('createrumahsakitdokter') ? 'selected' : '') : ($item->rs_id == $dokterEdit->RumahSakit->rs_id ? 'selected' : '') }}>
                                    {{ $item->rs_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 {{ $editId == -1 ? '' : 'hidden' }}">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Password
                            @error('createpasswordokter')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="password" name="createpasswordokter">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Tipe Spesialis
                        </label>
                        <select class="select block w-full bg-white" name="createspesialisdokter">
                            @foreach ($spesialis as $item)
                                <option value="{{ $item->sp_id }}"
                                    {{ $editId == -1 ? ($item->sp_id == old('createspesialisdokter') ? 'selected' : '') : ($item->sp_id == $dokterEdit->Spesialis->sp_id ? 'selected' : '') }}>
                                    {{ $item->sp_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 {{ $editId == -1 ? '' : 'hidden' }}">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Surat Ijin Praktek
                            @error('createsipdokter')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input class="file-input file-input-bordered file-input-accent w-full" id="grid-email"
                            type="file" name="createsipdokter">
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 {{ $editId == -1 ? 'hidden' : '' }}">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Status
                            @error('createstatusdokter')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>

                        <div class="flex items-center">
                            <a href="{{ route('admin.getsip', ['id' => $editId]) }}"
                                class="btn btn-outline btn-accent">Download
                                SIP</a>
                            <input type="radio" value="1" name="createstatusdokter" class="radio radio-success ml-8" {{$editId != -1 ? ($dokterEdit->dk_status==1 ? "checked" : "") : ""}}/>
                            <span class="block uppercase tracking-wide text-gray-700 text-xs font-bold ml-1">Aktif</span>
                            <input type="radio" value="0" name="createstatusdokter" class="radio radio-error ml-8" {{$editId != -1 ? ($dokterEdit->dk_status==0 ? "checked" : "") : ""}} />
                            <span class="block uppercase tracking-wide text-gray-700 text-xs font-bold ml-1">Non-Aktif</span>
                        </div>

                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <button
                            class="btn btn-accent text-white btn-wide w-full">{{ $editId == -1 ? 'Add Dokter' : 'Edit Dokter' }}</button>
                    </div>
                </div>
            </form>
        </div>

        <form action="{{ route('admin.dokter') }}" class="p-[10px] w-1/2 flex mt-auto justify-end">
            <input type="text" placeholder="Cari Nama Dokter" class="input input-bordered w-full max-w-lg bg-white"
                name="searchdokter" />
            <button class="p-[2px] btn btn-secondary w-full w-32 ml-2">
                Search
            </button>
        </form>
    </div>
    <div class="p-[10px] w-full">
        <div class="w-full overflow-auto">
            <table class="table w-full">
                <thead class="text-white">
                    <tr>
                        <th class="bg-accent">No.</th>
                        <th class="bg-accent">Nama Dokter</th>
                        <th class="bg-accent">Tanggal Daftar</th>
                        <th class="bg-accent">Email Dokter</th>
                        <th class="bg-accent">No. Telpon</th>
                        <th class="bg-accent">Rumah Sakit</th>
                        <th class="bg-accent">Status</th>
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
                            <td>{{ $dk->RumahSakit->rs_nama }}</td>
                            <td class="font-bold {{ $dk->dk_status==1 ? "text-success" : "text-error" }}">{{ $dk->dk_status==1 ? "Aktif" : "Non-Aktif" }}</td>
                            <td>
                                <a href="{{ route('admin.dokter', ['editId' => $dk->dk_id]) }}"
                                    class="btn btn-info text-white">Edit</a>
                                @if ($dk->trashed())
                                    <a href="{{ url("admin/dokter/$dk->dk_id/delete") }}"
                                        class="btn btn-success">Unban</a>
                                @else
                                    <a href="{{ url("admin/dokter/$dk->dk_id/delete") }}" class="btn btn-error">Ban</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
