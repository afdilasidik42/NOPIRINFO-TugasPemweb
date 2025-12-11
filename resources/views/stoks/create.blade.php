@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-xl">
        <h2 class="text-2xl font-bold text-white mb-6">Tambah Stok Barang</h2>

        <form action="{{ route('stoks.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Lokasi Toko</label>
                <select name="toko_id" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition">
                    <option value="" disabled selected>-- Pilih Cabang Toko --</option>
                    @foreach($tokos as $toko)
                        <option value="{{ $toko->id }}">{{ $toko->nama_toko }} ({{ $toko->alamat }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition" placeholder="Contoh: Laptop Gaming X1">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-2">Harga Satuan (Rp)</label>
                    <input type="number" name="harga" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition" placeholder="0">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-2">Jumlah Stok</label>
                    <input type="number" name="jumlah_stok" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition" placeholder="0">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Deskripsi Singkat</label>
                <textarea name="deskripsi" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition"></textarea>
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('stoks.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 transition">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-lg bg-indigo-600 text-white font-bold hover:bg-indigo-500 shadow-lg shadow-indigo-500/20 transition">Simpan Item</button>
            </div>
        </form>
    </div>
</div>
@endsection