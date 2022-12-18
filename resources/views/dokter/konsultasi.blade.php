@extends('layout.setup')

@section('header')
@include('dokter.components.navbar')
@endsection

@section('main')
    <div class="flex w-full grow">
        <div class="w-1/4 bg-secondary-focus overflow-y-auto">
            @foreach ($konsultasi as $k)
                <a href="{{ route('dokter.konsultasi', $k->ks_id) }}">
                    <div class="w-full h-20 p-5 text-base-100 border-b-2 border-base-100 hover:bg-secondary-content hover:bg-opacity-10">
                        {{ $k->Pasien->ps_nama }}
                    </div>
                </a>
            @endforeach
        </div>
        <div class="flex flex-col w-3/4 bg-slate-300 p-5 overflow-y-auto">
            <div class="w-full flex-grow" id="chatroom"></div>
            <div class="w-full h-16 my-auto flex items-center gap-x-2 px-2 pt-auto">
                @if($konsultasi_id)
                    <input type="text" placeholder="Type here..." class="input input-bordered w-full" id="chat-text" onkeydown="submit(this)"/>
                    <button class="btn btn-secondary rounded-full" id="chat-send"><i class="fa-sharp fa-solid fa-paper-plane"></i></button>
                @endif
            </div>
        </div>
    </div>
    <script>
        refreshChat()
        setInterval(() => {
            refreshChat()
        }, 1000);


        function createBubble(data){
            let item = document.createElement("div")
            let content = document.createElement("div")
            item.classList.add("chat")
            content.classList.add("chat-bubble")
            if(data["ch_sender_is_dokter"] == 0){
                item.classList.add("chat-start", "pr-80")
                content.classList.add("bg-secondary", "text-base-100")
            }else{
                item.classList.add("chat-end","pl-80")
                content.classList.add("bg-base-100", "text-secondary")
            }
            content.innerHTML = data["ch_teks"];
            item.appendChild(content)
            return item;
        }

        @if ($konsultasi_id)
        let chatSend = document.getElementById("chat-send")


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
    </script>
@endsection
