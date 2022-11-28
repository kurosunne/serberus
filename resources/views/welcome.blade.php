@extends('layout.setup')

@section('main')
    <div class="h-full flex justify-center items-center">
        <div class="bg-primary h-[35rem] w-[65rem] rounded-lg flex border-black" style="border: 4px solid #FFB034">
            {{-- kiri --}}
            <div class="h-full w-1/2">

            </div>

            {{-- kanan --}}
            <form method="POST" class="h-full w-1/2 bg-base-100 rounded-tr-lg rounded-br-lg flex flex-col items-center">
                @csrf
                <p class="text-3xl font-bold text-primary mt-10">Login Account</p>
                <div class=" w-full max-w-md text-xl text-primary mt-6">Username</div>
                <input type="text" name="username" value="{{ old('username') }}" placeholder="Username"
                    class="input input-bordered input-primary w-full max-w-md mt-2" />
                @error('username')
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
                <a href="" class="w-full max-w-md mt-2"><div class="btn btn-primary btn-outline w-full text-base-100">Register</div></a>
            </form>

        </div>
    </div>
@endsection
