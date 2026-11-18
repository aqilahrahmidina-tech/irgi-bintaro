<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irgi Bintaro - Katalog Pakaian</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f7f4;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: white;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .category-link {
            text-decoration: none;
            color: #333;
            padding: 9px 18px;
            border: 1px solid #ddd;
            border-radius: 25px;
            display: inline-block;
            margin: 4px;
            background: white;
        }

        .category-link.active,
        .category-link:hover {
            background: #212529;
            color: white;
            border-color: #212529;
        }

        .product-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: 0.2s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-4px);
        }

        .product-image {
            width: 100%;
            height: 260px;
            object-fit: cover;
            background: #eee;
        }

        .product-price {
            font-size: 18px;
            font-weight: bold;
        }

        .search-box {
            border-radius: 8px;
            padding: 12px;
        }

        footer {
            background: #212529;
            color: white;
            padding: 25px;
            margin-top: 60px;
            text-align: center;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand brand" href="{{ route('home') }}">
            IRGI BINTARO
        </a>

        <div class="ms-auto">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark me-3">
                Beranda
            </a>
            <a href="{{ route('catalog.index') }}" class="text-decoration-none text-dark">
                Katalog Produk
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">

    <!-- JUDUL KATALOG -->
    <div class="mb-4">
        <h2 class="fw-bold">Katalog Produk</h2>
        <p class="text-muted">
            Temukan pakaian sesuai kebutuhan dan gaya Anda.
        </p>
    </div>

    <!-- PENCARIAN PRODUK -->
    <form action="{{ route('catalog.index') }}" method="GET" class="mb-4">
        <div class="row g-2">

            <div class="col-md-9">
                <input
                    type="text"
                    name="search"
                    class="form-control search-box"
                    placeholder="Cari nama produk..."
                    value="{{ request('search') }}"
                >
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-dark w-100 search-box">
                    Cari Produk
                </button>
            </div>

        </div>

        @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
    </form>

    <!-- FILTER KATEGORI -->
    <section class="mb-5">

        <h5 class="fw-bold mb-3">Kategori Pakaian</h5>

        <a href="{{ route('catalog.index', ['search' => request('search')]) }}"
           class="category-link {{ !request('category') ? 'active' : '' }}">
            Semua Produk
        </a>

        @foreach ($categories as $category)
            <a href="{{ route('catalog.index', [
                'category' => $category,
                'search' => request('search')
            ]) }}"
               class="category-link {{ request('category') == $category ? 'active' : '' }}">
                {{ $category }}
            </a>
        @endforeach

    </section>

    <!-- DAFTAR PRODUK -->
    <section id="produk">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="fw-bold mb-1">Koleksi Produk</h4>

                <p class="text-muted mb-0">
                    @if(request('category'))
                        Kategori: {{ request('category') }}
                    @elseif(request('search'))
                        Hasil pencarian: {{ request('search') }}
                    @else
                        Semua koleksi pakaian Irgi Bintaro
                    @endif
                </p>
            </div>

            <span class="text-muted">
                {{ $products->count() }} Produk
            </span>

        </div>

        <div class="row g-4">

            @forelse ($products as $product)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="card product-card shadow-sm">

                        <a href="{{ route('catalog.detail', $product->id) }}">
                            @if ($product->image)
                                <img
                                    src="{{ $product->image }}"
                                    class="product-image"
                                    alt="{{ $product->name }}"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='https://placehold.co/600x700?text=Foto+Produk';"
                                >
                            @else
                                <img
                                    src="https://placehold.co/600x700?text=Foto+Produk"
                                    class="product-image"
                                    alt="Foto produk belum tersedia"
                                >
                            @endif
                        </a>

                        <div class="card-body">

                            <h6 class="fw-bold mb-2">
                                {{ $product->name }}
                            </h6>

                            <p class="product-price mb-3">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>

                            <a href="{{ route('catalog.detail', $product->id) }}"
                               class="btn btn-outline-dark btn-sm w-100">
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="alert alert-secondary text-center">
                        Produk yang kamu cari tidak ditemukan.
                    </div>
                </div>

            @endforelse

        </div>

    </section>

</div>

<!-- FOOTER -->
<footer>
    <h5>IRGI BINTARO</h5>
    <p class="mb-0">
        Katalog Pakaian - Temukan Gaya Terbaik Anda
    </p>
    <small>
        &copy; {{ date('Y') }} Irgi Bintaro. All Rights Reserved.
    </small>
</footer>

</body>
</html>
