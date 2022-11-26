@extends('layout.setupadmin')

@section('header')
<div class="navbar  bg-neutral">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </label>
      </div>
      <a class="btn btn-ghost normal-case text-xl">Serberus</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal p-0">
        <li><a href="listpasien" class="btn btn-ghost normal-case text-xl">Beranda</a></li>
        <li><a href ="listrumahsakit" class="btn btn-ghost normal-case text-xl">Rumah Sakit</a></li>
        <li><a href ="listdokter" class="btn btn-ghost normal-case text-xl">Dokter</a></li>
        <li class="text-white"><a href ="listobat" class="btn btn-ghost normal-case text-xl">Obat</a></li>
        <li><a class="btn btn-ghost normal-case text-xl">Riwayat</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a class="btn btn-error" href="">Logout</a>
    </div>
  </div>
@endsection

@section('main')
<div class="initable">
    <div class="overflow-x-auto">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th>Nama Obat</th>
              <th>Jumlah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <td>Cy Ganderton</td>
              <td>Quality Control Specialist</td>
              <td>
                <a href="" class="btn btn-accent">Detail</a>
              </td>
            </tr>
            <tr class="active">
              <th>2</th>
              <td>Hart Hagerty</td>
              <td>Desktop Support Technician</td>
              <td><a href="" class="btn btn-accent">Detail</a></td>
            </tr>
            <tr>
              <th>3</th>
              <td>Brice Swyre</td>
              <td>Tax Accountant</td>
              <td><a href="" class="btn btn-accent">Detail</a></td>
            </tr>
          </tbody>
        </table>
      </div>
</div>

<div class="inidetailobat">
    <form class="w-full max-w-lg" action="" method="POST">
        @csrf
        <div class="text">
        Detail Obat
        </div>
        <br>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
              Nama
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-nama" type="text" name="namaobat">
          </div>
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
              Harga
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="number" name="hargaobat">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-telepon">
              Jumlah
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-telepon" type="number" name="jumlahobat">
          </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-telepon">
                Status
                </label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" name="statuspasien" class="radio"/>
                        <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" name="statuspasien" class="radio" />
                        <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Aktif</label>
                    </div>
                </div>
            </div>
          </div>
          <div class="flex flex-wrap -mx-3 mb-3">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <button class="btn btn-error btn-wide">Delete Akun</button>
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <button class="btn btn-outline btn-wide">Edit Akun</button>
            </div>
          </div>
        </div>
      </form>
</div>

<div class="inicreateobat">
    <form class="w-full max-w-lg" action="" method="POST">
        @csrf
        <div class="text">
            Tambah Obat
        </div>
        <br>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-nama">
                Nama
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-nama" type="text" name="createnamaobat">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                Harga
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" name="createhargaobat">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                Jumlah
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" type="text" name="createjumlahobat">
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/4"></div>
            <div class="w-full md:w-2/4 px-4 mb-6 md:mb-0">
                <button class="btn btn-outline btn-wide">Add Obat</button>
            </div>
        </div>
    </form>
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
