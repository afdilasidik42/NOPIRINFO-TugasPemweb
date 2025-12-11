@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-xl">
        <h2 class="text-2xl font-bold text-white mb-6">Edit Stok Barang</h2>

        <form action="{{ route('stoks.update', $stok->id) }}" method="POST" class="space-y-6">
            @csrf @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Lokasi Toko</label>
                <select name="toko_id" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition">
                    @foreach($tokos as $toko)
                        <option value="{{ $toko->id }}" {{ $stok->toko_id == $toko->id ? 'selected' : '' }}>
                            {{ $toko->nama_toko }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $stok->nama_barang) }}" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-2">Harga Satuan (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga', $stok->harga) }}" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-2">Jumlah Stok</label>
                    <input type="number" name="jumlah_stok" value="{{ old('jumlah_stok', $stok->jumlah_stok) }}" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition">{{ old('deskripsi', $stok->deskripsi) }}</textarea>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('stoks.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 transition">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 text-white font-bold hover:bg-indigo-500 shadow-lg shadow-indigo-500/20 transition">Update Stok</button>
            </div>
        </form>
    </div>
</div>
@endsection