<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    // 1. LIHAT DATA (READ)
    public function index()
    {
        $tokos = Toko::latest()->get(); // Ambil data terbaru
        return view('tokos.index', compact('tokos'));
    }

    // 2. FORM TAMBAH (CREATE)
    public function create()
    {
        return view('tokos.create');
    }

    // 3. SIMPAN DATA (STORE)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_toko' => 'required|max:255',
            'alamat'    => 'required',
            'foto_toko' => 'image|file|max:2048|nullable' // Validasi Gambar
        ]);

        if ($request->file('foto_toko')) {
            $validated['foto_toko'] = $request->file('foto_toko')->store('toko-images', 'public');
        }

        Toko::create($validated);

        return redirect()->route('tokos.index')->with('success', 'Toko berhasil dibangun!');
    }

    // 4. FORM EDIT (EDIT)
    public function edit(Toko $toko)
    {
        return view('tokos.edit', compact('toko'));
    }

    // 5. UPDATE DATA (UPDATE)
    public function update(Request $request, Toko $toko)
    {
        $rules = [
            'nama_toko' => 'required|max:255',
            'alamat'    => 'required',
            'foto_toko' => 'image|file|max:2048|nullable'
        ];

        $validated = $request->validate($rules);

        // Cek kalau user upload gambar baru
        if ($request->file('foto_toko')) {
            // Hapus gambar lama kalau ada (biar server gak penuh)
            if ($toko->foto_toko) {
                Storage::delete($toko->foto_toko);
            }
            $validated['foto_toko'] = $request->file('foto_toko')->store('toko-images', 'public');
        }

        $toko->update($validated);

        return redirect()->route('tokos.index')->with('success', 'Data toko berhasil diperbarui!');
    }

    // 6. HAPUS DATA (DESTROY)
    public function destroy(Toko $toko)
    {
        // Hapus gambarnya juga pas datanya dihapus
        if ($toko->foto_toko) {
            Storage::delete($toko->foto_toko);
        }
        
        $toko->delete();
        return redirect()->route('tokos.index')->with('success', 'Toko berhasil dihapus permanen.');
    }
}