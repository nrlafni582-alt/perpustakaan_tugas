<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display listing buku + search + filter
     */
    public function index(Request $request)
    {
        $query = Buku::query();

        // 🔍 SEARCH
        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->keyword . '%')
                  ->orWhere('pengarang', 'like', '%' . $request->keyword . '%')
                  ->orWhere('penerbit', 'like', '%' . $request->keyword . '%');
            });
        }

        // 📚 FILTER KATEGORI
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // 📅 FILTER TAHUN
        if ($request->filled('tahun')) {
            $query->where('tahun_terbit', $request->tahun);
        }

        // 📦 FILTER STATUS
        if ($request->filled('status')) {
            if ($request->status == 'tersedia') {
                $query->where('stok', '>', 0);
            } elseif ($request->status == 'habis') {
                $query->where('stok', 0);
            }
        }

        // 📖 DATA BUKU HASIL FILTER
        $bukus = $query->latest()->get();

        // 📊 STATISTIK GLOBAL
        $totalBuku = Buku::count();
        $bukuTersedia = Buku::where('stok', '>', 0)->count();
        $bukuHabis = Buku::where('stok', 0)->count();

        return view('buku.index', compact(
            'bukus',
            'totalBuku',
            'bukuTersedia',
            'bukuHabis'
        ));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        // nanti tugas berikutnya
    }

    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, string $id)
    {
        // nanti tugas berikutnya
    }

    public function destroy(string $id)
    {
        // nanti tugas berikutnya
    }
}

