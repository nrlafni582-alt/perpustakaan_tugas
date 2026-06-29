@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-book"></i>
        Daftar Buku
    </h1>

    <a href="{{ route('buku.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i>
        Tambah Buku
    </a>
</div>

{{-- 📊 STATISTIK --}}
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body text-center">
                <h6>Total Buku</h6>
                <h2>{{ $totalBuku }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body text-center">
                <h6>Buku Tersedia</h6>
                <h2>{{ $bukuTersedia }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body text-center">
                <h6>Buku Habis</h6>
                <h2>{{ $bukuHabis }}</h2>
            </div>
        </div>
    </div>

</div>

{{-- 🔍 SEARCH + FILTER --}}
<div class="card mb-4">
    <div class="card-body">

        <form action="{{ route('buku.index') }}" method="GET">

            <div class="row g-2">

                {{-- keyword --}}
                <div class="col-md-3">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Cari judul / pengarang / penerbit..."
                           value="{{ request('keyword') }}">
                </div>

                {{-- kategori --}}
                <div class="col-md-2">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="Programming" {{ request('kategori')=='Programming'?'selected':'' }}>Programming</option>
                        <option value="Database" {{ request('kategori')=='Database'?'selected':'' }}>Database</option>
                        <option value="Web Design" {{ request('kategori')=='Web Design'?'selected':'' }}>Web Design</option>
                        <option value="Networking" {{ request('kategori')=='Networking'?'selected':'' }}>Networking</option>
                        <option value="Data Science" {{ request('kategori')=='Data Science'?'selected':'' }}>Data Science</option>
                    </select>
                </div>

                {{-- tahun --}}
                <div class="col-md-2">
                    <select name="tahun" class="form-select">
                        <option value="">Semua Tahun</option>
                        @for($i = date('Y'); $i >= 2000; $i--)
                            <option value="{{ $i }}" {{ request('tahun')==$i?'selected':'' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                {{-- status --}}
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="tersedia" {{ request('status')=='tersedia'?'selected':'' }}>Tersedia</option>
                        <option value="habis" {{ request('status')=='habis'?'selected':'' }}>Habis</option>
                    </select>
                </div>

                {{-- button --}}
                <div class="col-md-3 d-grid">
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                        Cari
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>

{{-- 📚 LIST BUKU --}}
<div class="row">

    @forelse($bukus as $buku)

        <div class="col-md-4 mb-4">
            <x-buku-card :buku="$buku" :show-actions="true"/>
        </div>

    @empty

        <div class="col-12">
            <div class="alert alert-info">
                Tidak ada data buku.
            </div>
        </div>

    @endforelse

</div>

{{-- 📄 INFO --}}
@if($bukus->count() > 0)
    <div class="text-center mt-3">
        <p class="text-muted">
            Menampilkan {{ $bukus->count() }} buku
        </p>
    </div>
@endif

@endsection