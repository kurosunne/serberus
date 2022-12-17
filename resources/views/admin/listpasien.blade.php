@extends('layout.setup')

@section('header')
    @include('admin.components.navbar')
@endsection

@section('main')
    <div class="p-[10px] w-full flex">
        <div class="w-2/3 mt-8">
            <form class="w-full" action="{{ $editId==-1 ? route('admin.addpasien') : route('admin.editpasien',["editId" => $editId]) }}" method="POST">
                @csrf
                <div class="text-center text-2xl font-bold">
                    {{ $editId==-1 ? "Tambah Pasien" : "Edit Pasien" }}
                </div>
                <br>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full {{ $editId==-1 ? "md:w-full" : "md:w-1/2" }} px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                            Nama
                            @error('createnamapasien')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-nama" type="text" name="createnamapasien" value="{{ $editId==-1 ? old('createnamapasien') : $pasienEdit->ps_nama }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Email
                            @error('createemailpasien')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createemailpasien" value="{{ $editId==-1 ? old('createemailpasien') : $pasienEdit->ps_email }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Telepon
                            @error('createteleponpasien')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" name="createteleponpasien" type="tel" value="{{ $editId==-1 ? old('createteleponpasien') : $pasienEdit->ps_telp }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                            Alamat
                            @error('createalamatpasien')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="text" name="createalamatpasien" value="{{ $editId==-1 ? old('createalamatpasien') : $pasienEdit->ps_alamat }}">
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 {{ $editId==-1 ? "" : "hidden" }}">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Password
                            @error('createpasswordpasien')
                                <span class="text-error">({{ $message }})</span>
                            @enderror
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-email" type="password" name="createpasswordpasien">
                    </div>
                </div>
                <div class="flex flex-wrap mb-3 w-full">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <button class="btn btn-accent text-white btn-wide w-full">{{ $editId==-1 ? "Add Pasien" : "Edit Pasien" }}</button>
                    </div>
                </div>
            </form>
        </div>


        <form action="{{ route('admin.pasien') }}" class="p-[10px] w-1/2 flex mt-auto justify-end">
            <input type="text" placeholder="Cari Nama Pasien" class="input input-bordered w-full max-w-lg bg-white"
                name="searchpasien"/>
            <button class="p-[2px] btn btn-secondary w-full w-32 ml-2">
                Search
            </button>
        </form>
    </div>
    <div class="p-[10px] w-full">
        <div class="w-full overflow-auto h-full">
            <table class="table w-full border-solid">
                <thead class="text-white">
                    <tr>
                        <th class="bg-accent">No.</th>
                        <th class="bg-accent">Nama Pasien</th>
                        <th class="bg-accent">Tanggal Daftar</th>
                        <th class="bg-accent">Email Pasien</th>
                        <th class="bg-accent">Alamat</th>
                        <th class="bg-accent">No Telp</th>
                        <th class="bg-accent">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $ps)
                        <tr>
                            <td>{{ $ps->ps_id }}</td>
                            <td>{{ $ps->ps_nama }}</td>
                            <td>{{ date('F j, Y', strtotime($ps->created_at)) }}</td>
                            <td>{{ $ps->ps_email }}</td>
                            <td>{{ $ps->ps_alamat }}</td>
                            <td>{{ $ps->ps_telp }}</td>
                            <td>
                                <a href="{{route('admin.pasien',["editId"=>$ps->ps_id])}}" class="btn btn-info text-white" {{ $ps->trashed() ? "disabled" : "" }}>Edit</a>
                                @if ($ps->trashed())
                                    <a href="{{ url("admin/pasien/$ps->ps_id/delete") }}" class="btn btn-success">Unban</a>
                                @else
                                    <a href="{{ url("admin/pasien/$ps->ps_id/delete") }}" class="btn btn-error">Ban</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    </div>
@endsection
