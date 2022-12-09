@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')
    <div class="p-[10px] w-full flex">
        <form class="w-2/3 mt-8" action="{{ $editId==-1 ? route('admin.addperawat') : route('admin.editperawat',["editId" => $editId]) }}" method="POST">
            @csrf
            <div class="text-center font-bold text-2xl">
                {{ $editId == -1 ? 'Tambah Perawat' : 'Edit Perawat' }}
            </div>
            <br>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full {{ $editId == -1 ? 'md:w-full' : 'md:w-1/2' }} px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                        Nama
                        @error('createnamaperawat')
                            <span class="text-error">({{ $message }})</span>
                        @enderror
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-nama" type="text" name="createnamaperawat" value="{{ $editId==-1 ? old('createnamaperawat') : $perawatEdit->pr_nama }}">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Email
                        @error('createemailperawat')
                            <span class="text-error">({{ $message }})</span>
                        @enderror
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="text" name="createemailperawat" value="{{ $editId==-1 ? old('createemailperawat') : $perawatEdit->pr_email }}">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Telepon
                        @error('createteleponperawat')
                            <span class="text-error">({{ $message }})</span>
                        @enderror
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="text" name="createteleponperawat" value="{{ $editId==-1 ? old('createteleponperawat') : $perawatEdit->pr_telp }}">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Rumah Sakit
                        @error('createrumahsakitperawat')
                            <span class="text-error">({{ $message }})</span>
                        @enderror
                    </label>
                    <select
                        class="select bg-white appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="text" name="createrumahsakitperawat">
                        @foreach ($rumahSakit as $item)
                            <option value="{{$item->rs_id}}" {{ ($editId==-1 ? ($item->rs_id==old('createrumahsakitperawat') ? "selected" : "") : ($item->rs_id==$perawatEdit->RumahSakit->rs_id ? "selected" : "") ) }} >{{$item->rs_nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 {{ $editId==-1 ? "" : "hidden" }}">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Password
                        @error('createpasswordperawat')
                            <span class="text-error">({{ $message }})</span>
                        @enderror
                    </label>
                    <input
                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="password" name="createpasswordperawat">
                </div>
            </div>
            <div class="flex flex-wrap mb-3">
                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                    <button class="btn btn-accent text-white btn-wide w-full">{{ $editId==-1 ? "Add Perawat" : "Edit Perawat" }}</button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.perawat') }}" class="p-[10px] w-1/2 flex mt-auto justify-end">
            <input type="text" placeholder="Cari Nama Perawat" class="input input-bordered w-full max-w-lg bg-white"
                name="searchperawat" />
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
                        <th class="bg-accent">Nama Perawat</th>
                        <th class="bg-accent">Tanggal Daftar</th>
                        <th class="bg-accent">Email Perawat</th>
                        <th class="bg-accent">No. Telp</th>
                        <th class="bg-accent">Rumah Sakit</th>
                        <th class="bg-accent">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perawat as $pr)
                        <tr>
                            <td>{{ $pr->pr_id }}</td>
                            <td>{{ $pr->pr_nama }}</td>
                            <td>{{ date('F j, Y', strtotime($pr->created_at)) }}</td>
                            <td>{{ $pr->pr_email }}</td>
                            <td>{{ $pr->pr_telp }}</td>
                            <td>{{ $pr->RumahSakit->rs_nama}}</td>
                            <td>
                                <a href="{{route('admin.perawat',["editId"=>$pr->pr_id])}}" class="btn btn-info text-white" {{ $pr->trashed() ? "disabled" : "" }}>Edit</a>
                                @if ($pr->trashed())
                                    <a href="{{ url("admin/deleteperawat/$pr->pr_id") }}" class="btn btn-success">Unban</a>
                                @else
                                    <a href="{{ url("admin/deleteperawat/$pr->pr_id") }}" class="btn btn-error">Ban</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
