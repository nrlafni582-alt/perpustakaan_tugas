<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand" href="{{ route('kategori.index') }}">
            Perpustakaan
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link">
                    Kategori
                </a>
            </li>
        </ul>

    </div>

</nav>

<div class="container mt-4">

    @yield('content')

</div>

</body>
</html>