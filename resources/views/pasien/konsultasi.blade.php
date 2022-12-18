@extends('layout.setup')

@section('header')
@include('pasien.navbar')
@endsection

@section('main')
    <div class="flex w-full grow overflow-y-hidden">
        <div class="w-1/4 bg-primary-focus overflow-y-auto">
            @foreach ($konsultasi as $k)
                <a href="{{ route('pasien.konsultasi', $k->ks_id) }}">
                    <div class="w-full h-20 p-5 text-base-100 border-b-2 border-base-100 hover:bg-primary-content hover:bg-opacity-10">
                        {{ $k->Dokter->dk_nama }}
                    </div>
                </a>
            @endforeach
        </div>
        <div class="flex flex-col w-3/4 bg-slate-300 p-5">
            <div class="w-full flex-grow overflow-y-auto" id="chatroom"></div>
            <div class="w-full h-16 my-auto flex items-center gap-x-2 px-2 pt-auto">
                @if($konsultasi_id)
                    <input type="text" placeholder="Type here..." class="input input-bordered w-full" id="chat-text" onkeydown="submit(this)"/>
                    <button class="btn btn-primary rounded-full" id="chat-send"><i class="fa-sharp fa-solid fa-paper-plane"></i></button>
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
            if(data["ch_sender_is_dokter"] == 1){
                item.classList.add("chat-start", "pr-80")
                content.classList.add("bg-base-100", "text-primary-focus")
            }else{
                item.classList.add("chat-end","pl-80")
                content.classList.add("bg-primary-focus", "text-base-100")
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
            xhr.open("POST", "{{ route('pasien.send', $konsultasi_id) }}")
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}")
            xhr.send(`message=${chatText.value}&sender_is_dokter=0`)
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
            xhr.open("GET", "{{route('pasien.chat', $konsultasi_id )}}");
            xhr.send();
        }
    </script>
@endsection
