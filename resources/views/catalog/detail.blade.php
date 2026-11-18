<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product->name }} - Irgi Bintaro</title>

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
            font-size: 24px;
            font-weight: bold;
            color: #795438;
        }

        .detail-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            margin-top: 35px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .detail-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 8px;
            background: #eee;
        }

        .product-name {
            font-size: 30px;
            font-weight: bold;
        }

        .product-price {
            font-size: 23px;
            font-weight: bold;
            color: #198754;
        }

        .option-item {
            display: inline-block;
            padding: 8px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin: 4px 3px 4px 0;
        }

        footer {
            margin-top: 60px;
            padding: 25px;
            background: #212529;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">

        <a href="{{ route('home') }}" class="brand text-decoration-none">
            IRGI BINTARO
        </a>

        <div>
            <a href="{{ route('home') }}" class="text-decoration-none text-dark me-3">
                Beranda
            </a>

            <a href="{{ route('catalog.index') }}" class="text-decoration-none text-dark">
                Katalog Produk
            </a>
        </div>

    </div>
</nav>


<!-- DETAIL PRODUK -->
<div class="container">

    <a href="{{ route('catalog.index') }}"
       class="btn btn-outline-secondary btn-sm mt-4">
        &larr; Kembali ke Katalog
    </a>

    <div class="detail-container">

        <div class="row g-4">

            <!-- GAMBAR PRODUK -->
            <div class="col-md-5">

                @if($product->image)
                    <img
                        src="{{ $product->image }}"
                        class="detail-image"
                        alt="{{ $product->name }}"
                        onerror="this.onerror=null;this.src='https://placehold.co/600x700?text=Foto+Produk';"
                    >
                @else
                    <img
                        src="https://placehold.co/600x700?text=Foto+Produk"
                        class="detail-image"
                        alt="Foto produk belum tersedia"
                    >
                @endif

            </div>


            <!-- INFORMASI PRODUK -->
            <div class="col-md-7">

                <span class="badge bg-secondary">
                    {{ $product->category }}
                </span>

                <h2 class="product-name mt-2">
                    {{ $product->name }}
                </h2>

                <p class="product-price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                <p class="text-muted">
                    {{ $product->description ?: 'Belum ada deskripsi produk.' }}
                </p>

                <hr>

                <!-- UKURAN -->
                <h6 class="fw-bold">Pilihan Ukuran</h6>

                @if($product->size)
                    @foreach(explode(',', $product->size) as $size)
                        <span class="option-item">
                            {{ trim($size) }}
                        </span>
                    @endforeach
                @else
                    <p class="text-muted">Informasi ukuran belum tersedia.</p>
                @endif

                <hr>

                <!-- WARNA -->
                <h6 class="fw-bold">Pilihan Warna</h6>

                <p class="text-muted">
                    Informasi warna akan ditampilkan setelah kolom warna ditambahkan ke database.
                </p>

                <hr>

                <!-- STOK -->
                <h6 class="fw-bold">Stok Produk</h6>

                <p>
                    {{ $product->stock }} tersedia
                </p>

                <!-- WHATSAPP -->
                @php
                    $number = '6282252390924';

                    $message = 'Halo Irgi Bintaro, saya ingin bertanya tentang produk '
                        . $product->name
                        . '. Apakah produk ini masih tersedia?';

                    $whatsappUrl = 'https://wa.me/' . $number
                        . '?text=' . urlencode($message);
                @endphp

                <a href="{{ $whatsappUrl }}"
                target="_blank"
                rel="noopener noreferrer"
                class="btn btn-success mt-3">
                    Chat WhatsApp
                </a>

            </div>

        </div>

    </div>

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
