@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-white">Data Inventaris</h2>
    <a href="{{ route('stoks.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-lg font-semibold shadow-lg shadow-indigo-500/20 transition">
        + Tambah Item Baru
    </a>
</div>

@if(session('success'))
    <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <table class="w-full text-left text-slate-400">
        <thead class="bg-slate-950 text-slate-200 uppercase text-xs font-bold tracking-wider">
            <tr>
                <th class="p-5 border-b border-slate-800">Nama Barang</th>
                <th class="p-5 border-b border-slate-800">Cabang Toko</th>
                <th class="p-5 border-b border-slate-800">Harga (Rp)</th>
                <th class="p-5 border-b border-slate-800 text-center">Stok</th>
                <th class="p-5 border-b border-slate-800 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800">
            @forelse($stoks as $stok)
            <tr class="hover:bg-slate-800/50 transition">
                <td class="p-5">
                    <p class="font-bold text-white text-lg">{{ $stok->nama_barang }}</p>
                    <p class="text-xs text-slate-500 truncate max-w-xs">{{ $stok->deskripsi ?? '-' }}</p>
                </td>
                <td class="p-5">
                    <span class="bg-cyan-900 text-cyan-300 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $stok->toko->nama_toko }}
                    </span>
                </td>
                <td class="p-5 text-emerald-400 font-mono">
                    Rp {{ number_format($stok->harga, 0, ',', '.') }}
                </td>
                <td class="p-5 text-center">
                    @if($stok->jumlah_stok > 0)
                        <span class="text-white font-bold">{{ $stok->jumlah_stok }}</span>
                    @else
                        <span class="text-red-500 font-bold text-xs">HABIS</span>
                    @endif
                </td>
                <td class="p-5 text-center">
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('stoks.edit', $stok->id) }}" class="text-yellow-500 hover:text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" /></svg>
                        </a>
                        <form action="{{ route('stoks.destroy', $stok->id) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-slate-500">
                    Belum ada data stok. Silakan tambah item baru.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection