@extends('layout.setup')

@section('main')
    <div class="h-full flex justify-center items-center">
        <div class="bg-primary h-[35rem] w-[65rem] rounded-lg flex border-black" style="border: 4px solid #FFB034">
            {{-- kiri --}}
            <div class="h-full w-1/2 p-5 items-center flex flex-col">
                <p class="text-3xl text-sky-600 mt-5">Selamat Datang Pada</p>
                <div class="h-1/3 w-1/3 mt-5">
                    <img src='{{url('image/serberus.png')}}' alt="ini image serberus" srcset="">
                </div>
                <p class="text-4xl font-bold text-sky-600 mt-1">Serberus</p>
                <p class="text-2xl text-sky-600 mt-1">Sehat Bersama Terus</p>
                <p class="text-2xl text-sky-600 mt-2">Mau Konsultasi Apa Hari Ini?</p>
                <p class="text-1.5xl text-sky-600 mt-3">Bukan Pasien?</p>
                <div class="flex flex-row mt-3 justify-between w-4/5">
                    {{-- Menuju halaman login dokter --}}
                    <a href="{{route('login.indexdokter')}}" class=" w-2/5 max-w-md "><button class="btn btn-secondary w-full max-w-md text-base-100">Saya Dokter</button></a>
                    {{-- Menuju halaman login perawat --}}
                    <a href="{{route('login.indexperawat')}}" class=" w-2/5 max-w-md "><button class="btn bg-white btn-outline btn-secondary w-full max-w-md text-base-100">Saya Perawat</button></a>
                </div>
            </div>

            {{-- kanan --}}
            <form method="POST" class="h-full w-1/2 bg-base-100 rounded-tr-lg rounded-br-lg flex flex-col items-center">
                @csrf
                <p class="text-3xl font-bold text-primary mt-10">Login Account</p>
                <div class=" w-full max-w-md text-xl text-primary mt-6">Email</div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                    class="input input-bordered input-primary w-full max-w-md mt-2" />
                @error('email')
                    <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                @enderror
                <div class=" w-full max-w-md text-xl text-primary mt-6">Password</div>
                <input type="password" name="password" placeholder="Password"
                    class="input input-bordered input-primary w-full max-w-md mt-2" />
                @error('password')
                    <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                @enderror
               <button class="btn btn-primary w-full max-w-md mt-8 text-base-100">Login</button>
                <div class=" w-full max-w-md text-xl text-primary mt-6">Belum Membuat Akun ?</div>
                <a href="{{route('register.indexpasien')}}" class="w-full max-w-md mt-2"><div class="btn btn-primary btn-outline w-full text-base-100">Register</div></a>
            </form>

        </div>
    </div>
@endsection
