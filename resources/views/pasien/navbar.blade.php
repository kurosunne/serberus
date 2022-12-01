<div class="h-20 w-full flex flex-row bg-primary    ">
    <div class="W-1/5 flex flex-col space-y-0 justify-start navbar bg-primary">
        <img src='{{ url('image/serberus.png') }}' alt="ini image serberus" srcset="" class="h-7 w-7">
        <p class="text-xs font-bold text-sky-600">Serberus</p>
        <p class="text-xs text-sky-600">Sehat Bersama Terus</p>
    </div>
    <div class="navbar-center hidden lg:flex w-3/5 items-center justify-center">
        <ul class="menu menu-horizontal p-0">
            <li><a>Beranda</a></li>
            <li><a>Janji Temu</a></li>
            <li><a>Beli Obat</a></li>
            <li><a>Riwayat</a></li>
            <li><a>Konsultasi</a></li>
        </ul>
    </div>
    <div class="navbar-end w-1/5 h-3/5 flex flex-end mt-4 mr-6">
        <div class="avatar">
            <div class="rounded-full w-12    mr-5">
                <img src='{{ url('image/avatar.jpg') }}' alt="ini image avatar" srcset="" class="h-24 w-24">
            </div>
        </div>
        <a class="btn btn-outline bg-accent w-20 h-5 p-0">Logout</a>
    </div>
</div>
