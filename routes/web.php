<?php

use Illuminate\Support\Facades\Route;

$anggota_list = [
    [
        'id' => 1,
        'kode' => 'AGT-001',
        'nama' => 'Budi Santoso',
        'email' => 'budi@email.com',
        'telepon' => '081234567890',
        'alamat' => 'Jakarta',
        'status' => 'Aktif'
    ],
    [
        'id' => 2,
        'kode' => 'AGT-002',
        'nama' => 'Kim Dokja',
        'email' => 'kdj@email.com',
        'telepon' => '081234567891',
        'alamat' => 'Bandung',
        'status' => 'Aktif'
    ],
    [
        'id' => 3,
        'kode' => 'AGT-003',
        'nama' => 'Yoo Joonghyuk',
        'email' => 'yjh@email.com',
        'telepon' => '081234567892',
        'alamat' => 'Surabaya',
        'status' => 'Nonaktif'
    ],
    [
        'id' => 4,
        'kode' => 'AGT-004',
        'nama' => 'Han Sooyoung',
        'email' => 'tls123@email.com',
        'telepon' => '081234567893',
        'alamat' => 'Yogyakarta',
        'status' => 'Aktif'
    ],
    [
        'id' => 5,
        'kode' => 'AGT-005',
        'nama' => 'Lee Jihye',
        'email' => 'jiyee@email.com',
        'telepon' => '081234567894',
        'alamat' => 'Semarang',
        'status' => 'Aktif'
    ]
];

Route::get('/anggota', function () use ($anggota_list) {
    return view('anggota.index', compact('anggota_list'));
});

Route::get('/anggota/{id}', function ($id) use ($anggota_list) {

    $anggota = collect($anggota_list)->firstWhere('id', $id);

    if (!$anggota) {
        abort(404);
    }

    return view('anggota.show', compact('anggota'));
});

use App\Http\Controllers\KategoriController;

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])->name('kategori.search');

Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');