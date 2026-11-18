<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang Kami - Irgi Bintaro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f7f4;
            color: #292929;
        }

        .navbar {
            background: white;
            padding: 18px 0;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #292929;
            text-decoration: none;
        }

        .nav-link {
            color: #333;
            margin-left: 20px;
        }

        .nav-link:hover {
            color: #9b7653;
        }

        .about-banner {
            background: #e9e5df;
            padding: 65px 20px;
            text-align: center;
        }

        .about-content {
            background: white;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }

        .about-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
        }

        .info-card {
            background: #f8f7f4;
            padding: 25px;
            border-radius: 10px;
            height: 100%;
        }

        footer {
            background: #252525;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 60px;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">

            <a class="brand" href="{{ route('home') }}">
                IRGI BINTARO
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('catalog.index') }}">
                            Katalog Produk
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            Tentang Kami
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('owner.login') }}">
                            Login Pemilik
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>


    <!-- BANNER -->
    <section class="about-banner">
        <div class="container">
            <h1 class="fw-bold">Tentang Irgi Bintaro</h1>

            <p class="text-muted mb-0">
                Mengenal lebih dekat toko dan koleksi pakaian Irgi Bintaro.
            </p>
        </div>
    </section>


    <!-- PROFIL TOKO -->
    <section class="container py-5">

        <div class="about-content">

            <div class="row align-items-center g-4">

                <div class="col-md-5">
                    <img
                        src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=900&q=85"
                        class="about-image"
                        alt="Koleksi pakaian Irgi Bintaro"
                    >
                </div>

                <div class="col-md-7">

                    <h2 class="about-title">
                        Selamat Datang di Irgi Bintaro
                    </h2>

                    <p>
                        Irgi Bintaro merupakan toko pakaian yang menyediakan
                        berbagai pilihan produk fashion untuk memenuhi
                        kebutuhan berpakaian pelanggan.
                    </p>

                    <p>
                        Berbagai kategori pakaian tersedia, mulai dari
                        baju anak, baju bayi, baju lengan pendek,
                        baju lengan panjang, celana panjang,
                        celana pendek, baju koko, hingga pakaian muslim.
                    </p>

                    <p>
                        Melalui website katalog ini, pengunjung dapat
                        melihat koleksi produk, mengetahui harga,
                        ukuran, warna, dan ketersediaan stok produk
                        sebelum menghubungi pihak toko.
                    </p>

                    <a href="{{ route('catalog.index') }}"
                       class="btn btn-dark mt-2">
                        Lihat Katalog Produk
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- INFORMASI -->
    <section class="container pb-5">

        <div class="text-center mb-4">
            <h3 class="fw-bold">Informasi Toko</h3>
            <p class="text-muted">
                Informasi mengenai produk dan layanan Irgi Bintaro.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="info-card text-center">
                    <h5 class="fw-bold">Koleksi Pakaian</h5>
                    <p class="text-muted mb-0">
                        Menyediakan berbagai jenis pakaian
                        untuk anak-anak hingga dewasa.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card text-center">
                    <h5 class="fw-bold">Informasi Produk</h5>
                    <p class="text-muted mb-0">
                        Pengunjung dapat melihat harga,
                        ukuran, warna, dan stok produk.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-card text-center">
                    <h5 class="fw-bold">Hubungi Toko</h5>
                    <p class="text-muted mb-0">
                        Pengunjung dapat menghubungi toko
                        melalui WhatsApp untuk bertanya tentang produk.
                    </p>
                </div>
            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer>
        <h5>IRGI BINTARO</h5>

        <p class="mb-1">
            Katalog Pakaian - Temukan Gaya Terbaik Anda
        </p>

        <small>
            &copy; {{ date('Y') }} Irgi Bintaro. All Rights Reserved.
        </small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
