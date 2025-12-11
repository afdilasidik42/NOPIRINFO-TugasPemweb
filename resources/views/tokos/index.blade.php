@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-white">Manajemen Toko</h2>
    <a href="{{ route('tokos.create') }}" class="bg-cyan-600 hover:bg-cyan-500 text-white px-5 py-2.5 rounded-lg font-semibold shadow-lg shadow-cyan-500/20 transition">
        + Tambah Toko Baru
    </a>
</div>

@if(session('success'))
<div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6">
    {{ session('success') }}
</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($tokos as $toko)
    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-cyan-500/10 transition group">
        <div class="h-48 overflow-hidden relative">
            @if($toko->foto_toko)
            <img src="{{ asset('storage/' . $toko->foto_toko) }}" alt="{{ $toko->nama_toko }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            @else
            <div class="w-full h-full bg-slate-800 flex items-center justify-center text-slate-600">
                No Image
            </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent opacity-80"></div>
            <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">{{ $toko->nama_toko }}</h3>
        </div>

        <div class="p-5">
            <p class="text-slate-400 text-sm mb-4 flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-cyan-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ $toko->alamat }}
            </p>

            <div class="flex justify-between items-center pt-4 border-t border-slate-800">
                <a href="{{ route('tokos.edit', $toko->id) }}" class="text-sm font-medium text-yellow-500 hover:text-yellow-400">Edit Data</a>

                <form action="{{ route('tokos.destroy', $toko->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus toko ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm font-medium text-red-500 hover:text-red-400">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
