@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-xl">
        <h2 class="text-2xl font-bold text-white mb-6">Registrasi Toko Baru</h2>

        <form action="{{ route('tokos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Nama Toko / Cabang</label>
                <input type="text" name="nama_toko" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500 transition" placeholder="Contoh: Nexus Cabang Bandung">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-white focus:border-cyan-500 focus:outline-none focus:ring-1 focus:ring-cyan-500 transition"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-400 mb-2">Foto Toko (Optional)</label>
                <input type="file" name="foto_toko" class="w-full text-sm text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-slate-800 file:text-cyan-400 hover:file:bg-slate-700 transition">
            </div>

            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('tokos.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-700 text-slate-300 hover:bg-slate-800 transition">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-lg bg-cyan-600 text-white font-bold hover:bg-cyan-500 shadow-lg shadow-cyan-500/20 transition">Simpan Data</button>
            </div>
        </form>
    </div>
</div>
@endsection