<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-300 p-6">
    <div class="bg-white h-1/3 w-3/6 m-auto my-6 p-6 rounded-lg">
        <h3 class="text-center"> Welcome to Legitcar Fullstack Developer Interview Test</h3>



        <div class="flex flex-row justify-center">
            <a href="{{ route('login') }}" class="border-blue-400 text-blue-500 text-center bg-blue-200 my-6 p-3 rounded-lg w-1/3">
                <button  type="button">
                    Login
                </button>
            </a>
        </div>
    </div>
    @livewireScripts
</body>

</html>
