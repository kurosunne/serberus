<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>
<body class="h-full">
    @yield('header')
    @yield('main')

    @if (Session::has('msg'))
        <input type="checkbox" id="my-modal" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Pesan</h3>
                <p class="py-4">{{ Session::get('msg') }}</p>
                <div class="modal-action">
                    <label for="my-modal" class="btn">Ok!</label>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('my-modal').checked = true;
        </script>

        {{ Session::Forget('msg') }}
    @endif
</body>
</html>
