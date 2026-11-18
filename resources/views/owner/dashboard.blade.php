<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Owner - Irgi Bintaro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f3ef;
        }

        .sidebar {
            background: #252525;
            min-height: 100vh;
            color: white;
            padding: 25px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 8px;
        }

        .sidebar a:hover {
            background: #444;
        }

        .content {
            padding: 35px;
        }

        .dashboard-card {
            border: none;
            border-radius: 12px;
            padding: 25px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 sidebar">
            <h4 class="mb-5">IRGI BINTARO</h4>

            <a href="{{ route('owner.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('owner.products.index') }}">
                Kelola Produk
            </a>

            <a href="{{ route('owner.products.create') }}">
                Tambah Produk
            </a>

            <hr>

            <form action="{{ route('owner.logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-outline-light w-100">
                    Logout
                </button>
            </form>
        </div>

        <!-- Konten -->
        <div class="col-md-9 col-lg-10 content">

            <h3>Dashboard Owner</h3>

            <p class="text-muted">
                Selamat datang di halaman pengelolaan Irgi Bintaro.
            </p>

            <div class="row g-4 mt-3">

                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm">
                        <h6 class="text-muted">Total Produk</h6>
                        <h2>{{ $totalProducts }}</h2>
                        <p class="mb-0">Produk pakaian</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm">
                        <h6 class="text-muted">Total Stok</h6>
                        <h2>{{ $totalStock }}</h2>
                        <p class="mb-0">Jumlah persediaan</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card dashboard-card shadow-sm">
                        <h6 class="text-muted">Kategori</h6>
                        <h2>{{ $totalProducts }}</h2>
                        <p class="mb-0">Kategori pakaian</p>
                    </div>
                </div>

            </div>

            <div class="card dashboard-card shadow-sm mt-4">
                <h5>Selamat Datang, Owner!</h5>

                <p class="text-muted">
                    Kelola katalog pakaian Irgi Bintaro melalui
                    dashboard ini. Kamu dapat menambahkan produk,
                    memperbarui informasi pakaian, dan mengatur stok.
                </p>
            </div>

        </div>

    </div>
</div>

</body>
</html>
