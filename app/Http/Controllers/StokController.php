<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Toko;
use Illuminate\Http\Request;

class StokController extends Controller
{
    // 1. LIHAT DAFTAR BARANG
    public function index()
    {
        $stoks = Stok::with('toko')->latest()->get();
        return view('stoks.index', compact('stoks'));
    }

    // 2. FORM TAMBAH BARANG
    public function create()
    {
        // Ambil semua data toko buat pilihan dropdown
        $tokos = Toko::all();
        return view('stoks.create', compact('tokos'));
    }

    // 3. SIMPAN BARANG
    public function store(Request $request)
    {
        $validated = $request->validate([
            'toko_id'     => 'required|exists:tokos,id', // Harus pilih toko yang valid
            'nama_barang' => 'required|max:255',
            'harga'       => 'required|numeric',
            'jumlah_stok' => 'required|numeric',
            'deskripsi'   => 'nullable'
        ]);

        Stok::create($validated);

        return redirect()->route('stoks.index')->with('success', 'Barang berhasil didaftarkan ke sistem!');
    }

    // 4. FORM EDIT
    public function edit(Stok $stok)
    {
        $tokos = Toko::all();
        return view('stoks.edit', compact('stok', 'tokos'));
    }

    // 5. UPDATE BARANG
    public function update(Request $request, Stok $stok)
    {
        $validated = $request->validate([
            'toko_id'     => 'required|exists:tokos,id',
            'nama_barang' => 'required|max:255',
            'harga'       => 'required|numeric',
            'jumlah_stok' => 'required|numeric',
            'deskripsi'   => 'nullable'
        ]);

        $stok->update($validated);

        return redirect()->route('stoks.index')->with('success', 'Data stok berhasil diperbarui!');
    }

    // 6. HAPUS BARANG
    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stoks.index')->with('success', 'Item dihapus dari database.');
    }
}