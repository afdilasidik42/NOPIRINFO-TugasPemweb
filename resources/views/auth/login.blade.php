<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NopirInfo</title>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-950 flex items-center justify-center h-screen text-slate-200">

    <div class="w-full max-w-sm p-8 bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl shadow-cyan-500/10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-cyan-400 tracking-widest">NOPIRINFO</h1>
            <p class="text-slate-500 text-sm mt-2">Info Toko dan Stoknya ada Disini</p>
        </div>

        @if(session('success'))
        <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-3 rounded-lg mb-4 text-sm text-center">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-3 rounded-lg mb-4 text-sm text-center">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase mb-2">Email Address</label>
                <input type="email" name="email" class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-lg focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 text-slate-200 placeholder-slate-600 transition" placeholder="admin@nexus.com">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 uppercase mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-3 bg-slate-950 border border-slate-800 rounded-lg focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 text-slate-200 placeholder-slate-600 transition" placeholder="••••••••">
            </div>

            <button type="submit" class="w-full py-3 bg-cyan-600 hover:bg-cyan-500 text-white font-bold rounded-lg transition transform active:scale-95 shadow-lg shadow-cyan-500/20">
                INITIALIZE SESSION
            </button>
        </form>

        <p class="mt-8 text-center text-sm text-slate-600">
            Belum punya akses? <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300 hover:underline">Register System</a>
        </p>
    </div>

</body>

</html>
