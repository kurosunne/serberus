@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')
    <div class="p-[10px] w-full flex">
        <div class="w-2/3 mt-8">
            <form class="w-full" action="{{ $editId==-1 ? route('admin.addobat') : route('admin.editobat',["editId" => $editId]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="text-center font-bold text-2xl">
                    {{ $editId == -1 ? 'Tambah obat' : 'Edit obat' }}
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full {{ $editId == -1 ? 'md:w-full' : 'md:w-1/2' }} px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                            @error('createnamaobat')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="createnamaobat"
                            value="{{ $editId == -1 ? old('createnamaobat') : $obatEdit->ob_nama }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Harga
                            @error('createhargaobat')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createhargaobat"
                            value="{{ $editId == -1 ? old('createhargaobat') : $obatEdit->ob_harga }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Stok
                            @error('createstokobat')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createstokobat"
                            value="{{ $editId == -1 ? old('createstokobat') : $obatEdit->ob_stok }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Tipe
                        </label>
                        <select class="select block w-full bg-white" name='createtipeobat'>
                            @foreach ($tipeObat as $item)
                                <option value="{{ $item->to_id }}"
                                    {{ $editId == -1 ? ($item->to_id == old('createtipeobat') ? 'selected' : '') : ($item->to_id == $obatEdit->TipeObat->to_id ? 'selected' : '') }}>
                                    {{ $item->to_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Deskripsi
                            @error('createdeskripsiobat')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createdeskripsiobat"
                            value="{{ $editId == -1 ? old('createdeskripsiobat') : $obatEdit->ob_deskripsi }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Jumlah Kandungan
                            @error('createjumlahobat')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createjumlahobat"
                            value="{{ $editId == -1 ? old('createjumlahobat') : $obatEdit->ob_kandunganVal }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Satuan Obat
                            @error('createsatuanobat')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createsatuanobat"
                            value="{{ $editId == -1 ? old('createsatuanobat') : $obatEdit->ob_kandunganSatuan }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Gambar Obat
                            @error('creategambarobat')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input class="file-input file-input-bordered file-input-accent w-full" id="grid-email"
                            type="file" name="creategambarobat">
                    </div>
                </div>
                <div class="flex flex-wrap mb-3">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <button
                            class="btn btn-accent text-white btn-wide w-full">{{ $editId == -1 ? 'Add obat' : 'Edit obat' }}</button>
                    </div>
                </div>
            </form>
        </div>

        <form action="{{ route('admin.obat') }}" class="p-[10px] w-1/2 flex mt-auto justify-end">
            <input type="text" placeholder="Cari Nama obat" class="input input-bordered w-full max-w-lg bg-white"
                name="searchobat" />
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
                        <th class="bg-accent">Nama obat</th>
                        <th class="bg-accent">Tanggal Ditambahkan</th>
                        <th class="bg-accent">Harga Obat</th>
                        <th class="bg-accent">Stok Obat</th>
                        <th class="bg-accent">Jumlah Kandungan Obat</th>
                        <th class="bg-accent">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obat as $ob)
                        <tr>
                            <td>{{ $ob->ob_id }}</td>
                            <td>{{ $ob->ob_nama }}</td>
                            <td>{{ date('F j, Y', strtotime($ob->created_at)) }}</td>
                            <td>{{ "Rp ". number_format($ob->ob_harga,2,',','.') }}</td>
                            <td>{{ $ob->ob_stok}}</td>
                            <td>{{ $ob->ob_kandunganVal }} {{ $ob->ob_kandunganSatuan }}</td>
                            <td>
                                <a href="{{route('admin.obat',["editId"=>$ob->ob_id])}}" class="btn btn-secondary text-white" {{ $ob->trashed() ? "disabled" : "" }} >Edit</a>
                                @if ($ob->trashed())
                                    <a href="{{ url("admin/obat/$ob->ob_id/delete") }}"
                                        class="btn btn-success">Unban</a>
                                @else
                                    <a href="{{ url("admin/obat/$ob->ob_id/delete") }}" class="btn btn-error">Ban</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
