
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Irgi Bintaro - Beranda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8f7f4;
        }

        /* NAVBAR */
        .navbar {
            background: #ffffff;
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
            color: #333333;
            margin-left: 20px;
            font-size: 14px;
        }

        .nav-link:hover {
            color: #9b7653;
        }

        /* HERO BANNER */
        .hero {
            min-height: 620px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;

            background:
                linear-gradient(
                    rgba(0, 0, 0, 0.50),
                    rgba(0, 0, 0, 0.50)
                ),
                url('https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&w=1800&q=85');

            background-size: cover;
            background-position: center;
        }

        .hero-content {
            color: white;
            max-width: 750px;
            padding: 30px 20px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .btn-katalog {
            display: inline-block;
            background: #ffffff;
            color: #222222;
            padding: 13px 32px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-katalog:hover {
            background: #9b7653;
            color: white;
        }

        /* FOOTER */
        footer {
            background: #252525;
            color: white;
            text-align: center;
            padding: 18px;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero {
                min-height: 500px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 15px;
            }

            .brand {
                font-size: 20px;
            }

            .nav-link {
                margin-left: 0;
            }
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


    <!-- HERO / LANDING PAGE -->
    <section class="hero">

        <div class="hero-content">

            <h1>
                Selamat Datang di Irgi Bintaro
            </h1>

            <p>
                Temukan berbagai pilihan pakaian berkualitas
                untuk melengkapi kebutuhan fashion Anda.
            </p>

            <a href="{{ route('catalog.index') }}" class="btn-katalog">
                Lihat Koleksi
            </a>

        </div>

    </section>


    <!-- FOOTER -->
    <footer>
        &copy; {{ date('Y') }} Irgi Bintaro. All Rights Reserved.
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
