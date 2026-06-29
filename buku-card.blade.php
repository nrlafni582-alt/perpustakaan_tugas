<div class="card shadow-sm h-100">

    <div class="card-body">

        <div class="text-center mb-3">

            <i class="bi bi-book text-primary" style="font-size:70px;"></i>

        </div>

        <h5 class="card-title">{{ $buku->judul }}</h5>

        <p>
            <i class="bi bi-person"></i>
            {{ $buku->pengarang }}
        </p>

        <p>
            <i class="bi bi-building"></i>
            {{ $buku->penerbit }}
        </p>

        <p class="fw-bold text-primary">
            {{ $buku->harga_format }}
        </p>

        <p>
            Stok :
            <strong>{{ $buku->stok }}</strong>
        </p>

        <span class="badge bg-primary">
            {{ $buku->kategori }}
        </span>

        <hr>

        @if($buku->stok > 0)

            <span class="badge bg-success">
                Tersedia
            </span>

        @else

            <span class="badge bg-danger">
                Habis
            </span>

        @endif

    </div>

    @if($showActions)

    <div class="card-footer">

        <a href="{{ route('buku.show',$buku->id) }}"
            class="btn btn-info btn-sm text-white">
            Detail
        </a>

        <a href="{{ route('buku.edit',$buku->id) }}"
            class="btn btn-warning btn-sm">
            Edit
        </a>

    </div>

    @endif

</div>