<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRTS</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-ark-bg text-ark-text font-quicksand antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-ark-panel border-r border-ark-border">
            @include('partials.sidebar')
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6 lg:p-10">
            @yield('content')
        </main>
    </div>
    
</body>
</html>