@extends('layouts.app')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h2 class="text-3xl font-bold text-white">Dashboard</h2>
        <p class="text-slate-400 mt-1">Selamat datang kembali, Agent <span class="text-cyan-400">{{ Auth::user()->name }}</span>.</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 flex items-center shadow-lg">
        <div class="p-4 bg-cyan-500/10 rounded-xl text-cyan-400 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm uppercase font-semibold">Total Toko</p>
            <h3 class="text-3xl font-bold text-white">{{ \App\Models\Toko::count() }}</h3>
        </div>
    </div>

    <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800 flex items-center shadow-lg">
        <div class="p-4 bg-indigo-500/10 rounded-xl text-indigo-400 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </div>
        <div>
            <p class="text-slate-500 text-sm uppercase font-semibold">Total Item Stok</p>
            <h3 class="text-3xl font-bold text-white">{{ \App\Models\Stok::count() }}</h3>
        </div>
    </div>
</div>

<div class="mt-8 bg-slate-900/50 p-6 rounded-2xl border border-slate-800 border-dashed text-center">
    <p class="text-slate-500">Silakan pilih menu <span class="text-cyan-400">Manajemen Toko</span> di samping untuk mulai mengelola data.</p>
</div>
@endsection