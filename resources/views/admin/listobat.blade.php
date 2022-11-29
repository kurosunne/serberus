@extends('layout.setup')

@section('header')
@include('admin.components.navbar')
@endsection

@section('main')
<div class="p-[10px] w-full flex">
    <div class="w-[49%] overflow-auto h-96">
        <table class="table w-full">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Obat</th>
              <th>Jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($obat as $ob)
            <tr>
              <td>{{ $ob->ob_id }}</td>
              <td>{{ $ob->ob_nama }}</td>
              <td>{{ $ob->ob_jumlah }}</td>
              <td><a href="" class="btn btn-accent">Detail</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="w-[49%] ml-2 overflow-auto shadow-lg">
        <form class="w-full" action="" method="POST">
            @csrf
            <div class="text">
                Detail obat
            </div>
            <br>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                        Nama obat
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-nama" type="text" name="namaobat">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-telepon">
                        Telepon
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-telepon" type="text" name="teleponobat">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-alamat">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="text" name="emailobat">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                        Status
                    </label>
                    <div class="flex">
                        <div class="flex items-center mr-4">
                            <input type="radio" name="statusobat" class="radio" />
                            <label for="inline-radio"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input type="radio" name="statusobat" class="radio" />
                            <label for="inline-radio"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Aktif</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <button class="btn btn-error btn-wide">Delete obat</button>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <button class="btn btn-outline btn-wide">Edit obat</button>
                </div>
            </div>

    </form>

    <div class="divider mt-4"></div>

    <form class="w-full" action="" method="POST">
        @csrf
        <div class="text">
            Tambah obat
        </div>
        <br>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                    Nama
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-nama" type="text" name="createnamaobat">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                    Email
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-email" type="text" name="createalamatobat">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                    Telepon
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-email" type="text" name="createteleponobat">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                    Tipe
                </label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" name="tipeobat" class="radio" />
                        <label for="inline-radio"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">obat</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" name="tipeobat" class="radio" />
                        <label for="inline-radio"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">obat</label>
                    </div>
                </div>
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
    padding: 10px;
    top: 100px;
    }

    .inidetailobat {
    border-radius: 25px;
    position: absolute;
    right: 100px;
    border: 1px solid #e0cdcd;
    padding: 10px;
    top: 70px;
    }

    .inicreateobat{
    border-radius: 25px;
    position: absolute;
    right: 100px;
    border: 1px solid #e0cdcd;
    padding: 10px;
    top: 450px;
    }

    .text{
        text-align: center;
        font-weight: bold;
    }
</style>
