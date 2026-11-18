<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Irgi Bintaro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f3ef;
        }

        .content {
            padding: 35px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .product-image {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="content">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3>Kelola Produk</h3>
                <p class="text-muted">
                    Daftar katalog pakaian Irgi Bintaro
                </p>
            </div>

            <a href="{{ route('owner.products.create') }}"
               class="btn btn-dark">
                + Tambah Produk
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover align-middle">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Ukuran</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        @if($product->image)
                                            <img
                                                src="{{ $product->image }}"
                                                class="product-image"
                                                alt="{{ $product->name }}"
                                            >
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->stock }}</td>

                                    <td>
                                        <a href="{{ route('owner.products.edit', $product->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('owner.products.destroy', $product->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        Belum ada produk yang ditambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        <a href="{{ route('owner.dashboard') }}"
           class="btn btn-outline-dark mt-3">
            Kembali ke Dashboard
        </a>

    </div>
</div>

</body>
</html>
