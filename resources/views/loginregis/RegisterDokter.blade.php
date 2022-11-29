@extends('layout.setup')

@section('main')
    <div class="h-full flex justify-center items-center">
        <form method="POST" class="">
            @csrf
            <div class="bg-base h-[35rem] w-[65rem] rounded-lg flex flex-col border-black" style="border: 4px solid #2596be">


                <div class="bg-base h-[5rem] w-[65rem] flex items-center align-center">
                    <p class="text-3xl font-bold text-secondary w-full text-center">Register Account</p>
                </div>
                <div class="bg-base h-[30rem] w-[64rem] rounded-lg flex flex-row">
                    {{-- kiri --}}
                    <div class="h-full w-1/2 items-center flex flex-col">
                        <div class=" w-full max-w-md text-xl text-secondary mt-6">Nama</div>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama"
                            class="input input-bordered input-secondary w-full max-w-md mt-2" />
                        @error('username')
                            <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class=" w-full max-w-md text-xl text-secondary mt-6">Email</div>
                        <input type="text" name="email" placeholder="Email"
                            class="input input-bordered input-secondary w-full max-w-md mt-2" />
                        @error('email')
                            <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class=" w-full max-w-md text-xl text-secondary mt-6">Telepon</div>
                        <input type="text" name="telepon" placeholder="Telepon"
                            class="input input-bordered input-secondary w-full max-w-md mt-2" />
                        @error('telepon')
                            <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                        @enderror
                        <a href="{{route('login.indexdokter')}}" class="w-full max-w-md mt-10">
                            <div class="btn btn-secondary btn-outline w-full text-base-100 mt-6">Batal</div>
                        </a>
                    </div>

                    {{-- kanan --}}
                    <div class="h-full w-1/2 bg-base-100 rounded-tr-lg rounded-br-lg flex flex-col items-center">
                        <div class="w-full max-w-md text-xl text-secondary mt-6 flex flex-row">
                            <div class="w-1/2">
                                <div class=" w-full max-w-md text-xl text-secondary">Rumah Sakit</div>
                                {{-- select box, menunggu for loop --}}
                                <select name="rs" id="rs" class="input input-bordered input-secondary w-4/5 max-w-md mt-2">
                                    <option value="dumi">dumi</option>
                                    <option value="dumi">dumi</option>
                                </select>
                                @error('rs')
                                    <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="w-1/2">
                                <div class=" w-full max-w-md text-xl text-secondary">Spesialis</div>
                                {{-- select box, menunggu for loop --}}
                                <select name="spesialis" id="spesialis" class="input input-bordered input-secondary w-4/5 max-w-md mt-2">
                                    <option value="dumi">dumi</option>
                                    <option value="dumi">dumi</option>
                                </select>
                                @error('spesialis')
                                    <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class=" w-full max-w-md text-xl text-secondary mt-6">Password</div>
                        <input type="password" name="password" value="{{ old('password') }}" placeholder="Password"
                            class="input input-bordered input-secondary w-full max-w-md mt-2" />
                        @error('password')
                            <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class=" w-full max-w-md text-xl text-secondary mt-6">Confirm Password</div>
                        <input type="password" name="confirm" placeholder="Confirm Password"
                            class="input input-bordered input-secondary w-full max-w-md mt-2" />
                        @error('confirm')
                            <div class=" w-full max-w-md text-xl text-error mt-2">{{ $message }}</div>
                        @enderror
                        <a href="" class="w-full max-w-md mt-10">
                            <div class="btn btn-secondary w-full max-w-md mt-6 text-base-100">Register</div>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
