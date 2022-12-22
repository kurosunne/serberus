@extends('layout.setup')

@section('header')
@include('dokter.components.navbar')
@endsection

@section('main')
    <div class="flex w-full grow  overflow-y-hidden">
        <div class="w-1/4 bg-secondary-focus overflow-y-auto">
            @foreach ($konsultasi as $k)
                <a href="{{ route('dokter.konsultasi', $k->ks_id) }}">
                    <div class="w-full h-20 p-5 text-base-100 border-b-2 border-base-100 hover:bg-secondary-content hover:bg-opacity-10">
                        {{ $k->Pasien->ps_nama }}
                    </div>
                </a>
            @endforeach
        </div>
        <div class="flex flex-col w-3/4 bg-slate-300 p-5 gap-y-3">
            <div class="w-full flex-grow overflow-y-auto" id="chatroom"></div>
            <div class="w-full bg-secondary h-60 flex-shrink-0 rounded-lg hidden flex-col p-3 gap-y-2" id="prescription-form">
                <div class="w-full flex-grow flex flex-col overflow-y-auto gap-2" id="prescription-list">
                    <div class="w-full gap-x-2 flex">
                        <select class="input input-bordered w-1/4">
                            <option value="" disabled selected>Obat</option>
                            @foreach ($obat as $o)
                                <option value="{{$o->ob_id}}">{{$o->ob_nama}} @if($o->ob_kandunganVal)({{$o->ob_kandunganVal}}{{$o->ob_kandunganSatuan}}) @endif</option>
                            @endforeach
                        </select>
                        <input type="number" placeholder="Hari Penggunaan" class="input input-bordered w-1/6"/>
                        <input type="text" placeholder="Keterangan" class="input input-bordered flex-grow"/>
                    </div>
                </div>
                <div class="w-full flex justify-end gap-x-2">
                    <button class="btn btn-error" onclick="clearObat()">Clear</button>
                    <button class="btn btn-primary" onclick="tambahObat()">Tambah Obat</button>
                    <button class="btn btn-success" onclick="buatResep()">Buat Resep</button>
                </div>
            </div>
            <div class="w-full h-20 my-auto flex items-center gap-x-2 px-2 pt-auto">
                @if($konsultasi_id)
                <a href="#leave-modal"><button class="btn btn-error btn-circle" id="chat-leave"><i class="w-4 h-4 text-lg items-center justify-center flex fa-solid fa-arrow-right-from-bracket"></i></i></button></a>
                <input type="text" placeholder="Type here..." class="input input-bordered w-full" id="chat-text" onkeydown="submit(this)"/>
                    <button class="btn btn-secondary btn-circle" id="chat-prescription"><i class="w-4 h-4 text-lg items-center justify-center flex fa-solid fa-file-prescription "></i></button>
                    <button class="btn btn-secondary btn-circle" id="chat-send"><i class="w-4 h-4 text-lg items-center justify-center flex fa-solid fa-paper-plane "></i></button>
                @endif
            </div>
        </div>
    </div>
    <div class="w-full gap-x-2 hidden" id="temp_a10fs3">
        <select class="input input-bordered w-1/4">
            <option value="" disabled selected>Obat</option>
            @foreach ($obat as $o)
                <option value="{{$o->ob_id}}">{{$o->ob_nama}} @if($o->ob_kandunganVal)({{$o->ob_kandunganVal}}{{$o->ob_kandunganSatuan}}) @endif</option>
            @endforeach
        </select>
        <input type="number" placeholder="Hari Penggunaan" class="input input-bordered w-1/6"/>
        <input type="text" placeholder="Keterangan" class="input input-bordered flex-grow"/>
    </div>
    @if($konsultasi_id)
    <div class="modal" id="leave-modal">
        <div class="modal-box">
          <h3 class="font-bold text-lg">Selesaikan Konsultasi</h3>
          <p class="py-4">Apakah anda yakin ingin menyelesaikan konsultasi? Setelah konsultasi diselesaikan anda tidak dapat lagi mengontak pasien</p>
          <div class="modal-action">
              <a href="" class="btn btn-error">Batal</a>
              <a href="{{ route('dokter.delete', $konsultasi_id) }}" class="btn btn-info">Benar</a>
          </div>
        </div>
      </div>
    @endif
    <script>
        @if ($konsultasi_id)

        refreshChat()
        setInterval(() => {
            refreshChat()
        }, 1000);

        let chatSend = document.getElementById("chat-send")
        let chatLeave = document.getElementById("chat-leave")
        let chatPrescription = document.getElementById("chat-prescription")
        let prescriptionForm =  document.getElementById("prescription-form")

        chatPrescription.addEventListener('click', ()=>{
            const xhr = new XMLHttpRequest()
            xhr.onload = function(){
                let resep_id = parseInt(this.responseText)
                if(resep_id >-1){
                    prescriptionForm.innerHTML = "<span>Resep sudah dibuat!</span>"
                    prescriptionForm.classList.add('text-white', 'justify-center', 'items-center')
                }
                prescriptionForm.classList.toggle("hidden")
                prescriptionForm.classList.toggle("flex")
            }
            xhr.open("GET", "{{route('dokter.statusresep', $konsultasi_id)}}");
            xhr.send()
        })

        function createBubble(data){
            let item = document.createElement("div")
            let content = document.createElement("div")
            item.classList.add("chat")
            content.classList.add("chat-bubble")
            if(data["ch_sender_is_dokter"] == 0){
                item.classList.add("chat-start", "pr-80")
                content.classList.add("bg-base-100", "text-secondary")
            }else{
                item.classList.add("chat-end","pl-80")
                content.classList.add("bg-secondary", "text-base-100")
            }
            let contentText = data["ch_teks"];
            if(contentText.startsWith("//_resep_obat_//")){
                content.innerHTML += `<div class="flex flex-col">`
                content.innerHTML += `<span class="font-semibold w-full flex justify-center border-b-2 pb-2">Resep Dokter</span>`
                @foreach ($resep as $r)
                    content.innerHTML += `
                        <div class="flex w-full justify-between gap-x-2">
                            <span>{{$r->Obat->ob_nama}}</span>
                            <span>x{{$r->re_hari}}</span>
                        </div>
                        <div class="pb-2">{{$r->re_keterangan}}</div>
                    `
                @endforeach
                content.innerHTML += `</span>`
            }
            else{
                content.innerHTML = contentText
            }
            item.appendChild(content)
            return item;
        }

        function refreshChat(){
            let chatroom = document.getElementById("chatroom");
            const xhr = new XMLHttpRequest();
            xhr.onload = function(){
                let res = JSON.parse(this.responseText);
                chatroom.innerHTML = "";
                for(r of res){
                    let bubble = createBubble(r)
                    chatroom.appendChild(bubble)
                }
            }
            xhr.open("GET", "{{route('dokter.chat', $konsultasi_id )}}");
            xhr.send();
        }

        function tambahObat(){
            let temp = document.getElementById("temp_a10fs3").cloneNode(true)
            temp.classList.remove("hidden")
            temp.classList.add("flex")
            temp.removeAttribute("id")
            let prescriptionList = document.getElementById("prescription-list")
            prescriptionList.appendChild(temp);
        }

        function clearObat(){
            let temp = document.getElementById("temp_a10fs3").cloneNode(true)
            temp.classList.remove("hidden")
            temp.classList.add("flex")
            temp.removeAttribute("id")
            let prescriptionList = document.getElementById("prescription-list")
            prescriptionList.innerHTML = ""
            prescriptionList.appendChild(temp);
        }

        function buatResep(){
            let prescriptionList = document.getElementById("prescription-list")
            let arrPresc = prescriptionList.children
            let prescription = []
            for(let i = 0 ; i < arrPresc.length ; i++){
                let obat = arrPresc[i].children[0].value
                let hari = arrPresc[i].children[1].value
                let keterangan = arrPresc[i].children[2].value
                prescription.push({
                    "obat": obat,
                    "hari": hari,
                    "keterangan": keterangan,
                })
            }
            const xhr = new XMLHttpRequest();
            xhr.onload = function(){
                if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
                    clearObat()
                    refreshChat()
                    chatPrescription.click();
                }
            }
            xhr.open("POST", "{{ route('dokter.resep', $konsultasi_id) }}")
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}")
            xhr.send(`prescription=${JSON.stringify(prescription)}`)
        }

        function submit(e){
            if(event.key == "Enter"){
                chatSend.click()
            }
        }

        chatSend.addEventListener('click', ()=>{
            let chatText = document.getElementById("chat-text")
            if(chatText.value.trim().length == 0){
                chatText.value = ""
                return
            }
            const xhr = new XMLHttpRequest();
            xhr.onload = function(){
                if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
                    chatText.value = ""
                    refreshChat()
                }
            }
            xhr.open("POST", "{{ route('dokter.send', $konsultasi_id) }}")
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}")
            xhr.send(`message=${chatText.value}&sender_is_dokter=1`)
        })

        @endif
    </script>
@endsection
