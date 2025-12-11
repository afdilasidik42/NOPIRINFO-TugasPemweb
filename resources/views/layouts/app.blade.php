<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NopirInfo</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-900 text-slate-200 antialiased">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-950 border-r border-slate-800 hidden md:block fixed h-full">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-cyan-400 tracking-wider">NOPIR<span class="text-white">INFO</span></h1>
            </div>
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="block py-2.5 px-4 rounded transition {{ Request::is('/') ? 'bg-slate-800 text-cyan-400' : 'hover:bg-slate-800 hover:text-cyan-400' }}">
                    Dashboard
                </a>

                <a href="{{ route('tokos.index') }}"
                    class="block py-2.5 px-4 rounded transition {{ Request::is('tokos*') ? 'bg-slate-800 text-cyan-400' : 'hover:bg-slate-800 hover:text-cyan-400' }}">
                    Manajemen Toko
                </a>

                <a href="{{ route('stoks.index') }}"
                    class="block py-2.5 px-4 rounded transition {{ Request::is('stoks*') ? 'bg-slate-800 text-cyan-400' : 'hover:bg-slate-800 hover:text-cyan-400' }}">
                    Data Stok
                </a>

                <form action="{{ route('logout') }}" method="POST" class="mt-8 border-t border-slate-800 pt-4">
                    @csrf
                    <button type="submit" class="w-full text-left py-2.5 px-4 text-red-400 hover:bg-red-500/10 rounded transition">
                        Logout System
                    </button>
                </form>
            </nav>
        </aside>

        <main class="flex-1 md:ml-64 p-8">
            <div class="md:hidden mb-6 flex justify-between items-center">
                <h1 class="text-xl font-bold text-cyan-400">NEXUS</h1>
                <button class="text-white">Menu</button>
            </div>

            @yield('content')
        </main>
    </div>

</body>

</html>