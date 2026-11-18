<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Irgi Bintaro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f3ef;
        }

        .form-card {
            background: white;
            border: none;
            border-radius: 12px;
            padding: 30px;
        }

        .preview-image {
            width: 150px;
            height: 170px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="mb-4">
        <h3>Edit Produk</h3>
        <p class="text-muted">Perbarui informasi produk Irgi Bintaro.</p>
    </div>

    <div class="card form-card shadow-sm">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('owner.products.update', $product->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="name"
                       class="form-control"
                       value="{{ old('name', $product->name) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select" required>
                    @foreach ([
                        'Baju Lengan Pendek',
                        'Baju Lengan Panjang',
                        'Celana Pendek',
                        'Celana Panjang',
                        'Baju Anak',
                        'Baju Bayi',
                        'Baju Muslim',
                        'Baju Koko'
                    ] as $category)
                        <option value="{{ $category }}"
                            {{ old('category', $product->category) == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          class="form-control"
                          rows="4"
                          required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="price"
                       class="form-control"
                       value="{{ old('price', $product->price) }}"
                       min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ukuran</label>
                <input type="text" name="size"
                       class="form-control"
                       value="{{ old('size', $product->size) }}"
                       placeholder="Contoh: S, M, L, XL"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Stok</label>
                <input type="number" name="stock"
                       class="form-control"
                       value="{{ old('stock', $product->stock) }}"
                       min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">URL Gambar Produk</label>
                <input type="url" name="image"
                       class="form-control"
                       value="{{ old('image', $product->image) }}"
                       placeholder="Masukkan URL gambar">
            </div>

            @if ($product->image)
                <div class="mb-4">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    <img src="{{ $product->image }}"
                         alt="{{ $product->name }}"
                         class="preview-image"
                         onerror="this.style.display='none'">
                </div>
            @endif

            <button type="submit" class="btn btn-dark">
                Simpan Perubahan
            </button>

            <a href="{{ route('owner.products.index') }}"
               class="btn btn-outline-secondary">
                Batal
            </a>

        </form>
    </div>
</div>

</body>
</html>
