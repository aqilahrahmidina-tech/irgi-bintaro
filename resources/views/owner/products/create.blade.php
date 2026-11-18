
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tambah Produk - Irgi Bintaro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .photo-card {
            cursor: pointer;
            border: 2px solid transparent;
            transition: 0.2s;
        }

        .photo-card:hover {
            border-color: #212529;
        }

        .photo-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .photo-card.selected {
            border-color: #198754;
        }

        #preview-image {
            max-width: 220px;
            max-height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="mb-4">
        <h3>Tambah Produk</h3>
        <p class="text-muted">
            Masukkan informasi pakaian Irgi Bintaro.
        </p>
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

        <form action="{{ route('owner.products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Pakaian</label>
                <input type="text" name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Kemeja Lengan Pendek"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-select" required>
                    <option value="">Pilih Kategori</option>

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
                            {{ old('category') == $category ? 'selected' : '' }}>
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
                    placeholder="Deskripsikan pakaian..."
                    required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" name="price"
                    class="form-control"
                    value="{{ old('price') }}"
                    min="0"
                    placeholder="Contoh: 75000"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ukuran</label>
                <input type="text" name="size"
                    class="form-control"
                    value="{{ old('size') }}"
                    placeholder="Contoh: S, M, L, XL"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Stok</label>
                <input type="number" name="stock"
                    class="form-control"
                    value="{{ old('stock', 0) }}"
                    min="0"
                    required>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">Cari Gambar Produk dari Unsplash</h5>

            <div class="input-group mb-3">
                <input type="text" id="search-query"
                    class="form-control"
                    placeholder="Contoh: women shirt, baby clothes, koko shirt">

                <button type="button" id="search-button"
                    class="btn btn-dark">
                    Cari Gambar
                </button>
            </div>

            <div id="search-message" class="text-muted mb-3"></div>

            <div id="photo-results" class="row g-3 mb-4"></div>

            <div class="mb-4">
                <label class="form-label">URL Gambar Terpilih</label>
                <input type="url" name="image"
                    id="image-url"
                    class="form-control"
                    value="{{ old('image') }}"
                    placeholder="URL gambar akan muncul setelah memilih foto">

                <div class="mt-3">
                    <img id="preview-image"
                        src="{{ old('image') }}"
                        alt="Preview gambar produk"
                        class="{{ old('image') ? '' : 'd-none' }}">
                </div>

                <div id="photo-credit" class="small text-muted mt-2"></div>
            </div>

            <button type="submit" class="btn btn-dark">
                Simpan Produk
            </button>

            <a href="{{ route('owner.products.index') }}"
                class="btn btn-outline-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

<script>
    const searchUrl = @json(route('owner.unsplash.search'));
    const trackUrl = @json(route('owner.unsplash.track'));
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const searchInput = document.getElementById('search-query');
    const searchButton = document.getElementById('search-button');
    const resultsContainer = document.getElementById('photo-results');
    const message = document.getElementById('search-message');
    const imageUrl = document.getElementById('image-url');
    const previewImage = document.getElementById('preview-image');
    const photoCredit = document.getElementById('photo-credit');

    async function searchUnsplash() {
        const query = searchInput.value.trim();

        if (!query) {
            message.textContent = 'Masukkan kata kunci gambar terlebih dahulu.';
            return;
        }

        message.textContent = 'Sedang mencari gambar...';
        resultsContainer.innerHTML = '';
        searchButton.disabled = true;

        try {
            const response = await fetch(
                searchUrl + '?q=' + encodeURIComponent(query),
                {
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            );

            if (!response.ok) {
                throw new Error('Pencarian gambar gagal. Periksa Access Key Unsplash.');
            }

            const photos = await response.json();

            if (photos.length === 0) {
                message.textContent = 'Gambar tidak ditemukan. Coba kata kunci lain.';
                return;
            }

            message.textContent = 'Pilih salah satu gambar berikut:';

            photos.forEach(photo => {
                const column = document.createElement('div');
                column.className = 'col-6 col-md-4 col-lg-3';

                const card = document.createElement('div');
                card.className = 'card photo-card h-100';

                const img = document.createElement('img');
                img.src = photo.image;
                img.alt = photo.alt;
                img.loading = 'lazy';

                const body = document.createElement('div');
                body.className = 'card-body p-2';

                const photographer = document.createElement('small');
                photographer.className = 'text-muted d-block mb-2';
                photographer.textContent = 'Foto: ' + photo.photographer;

                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'btn btn-sm btn-outline-dark w-100';
                button.textContent = 'Pilih Gambar';

                button.addEventListener('click', async () => {
                    try {
                        button.disabled = true;
                        button.textContent = 'Memilih...';

                        const trackResponse = await fetch(trackUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({
                                photo_id: photo.id
                            })
                        });

                        if (!trackResponse.ok) {
                            throw new Error('Gagal mencatat pemilihan gambar.');
                        }

                        imageUrl.value = photo.image;
                        previewImage.src = photo.image;
                        previewImage.classList.remove('d-none');

                        photoCredit.innerHTML = '';

                        const creditText = document.createTextNode('Foto oleh ' + photo.photographer + ' - ');
                        const creditLink = document.createElement('a');

                        creditLink.href = photo.photographer_url;
                        creditLink.target = '_blank';
                        creditLink.rel = 'noopener noreferrer';
                        creditLink.textContent = 'Lihat fotografer';

                        photoCredit.append(creditText, creditLink);

                        document.querySelectorAll('.photo-card').forEach(item => {
                            item.classList.remove('selected');
                        });

                        card.classList.add('selected');
                        button.textContent = 'Terpilih';

                    } catch (error) {
                        alert(error.message);
                        button.disabled = false;
                        button.textContent = 'Pilih Gambar';
                    }
                });

                card.appendChild(img);
                body.appendChild(photographer);
                body.appendChild(button);
                card.appendChild(body);
                column.appendChild(card);
                resultsContainer.appendChild(column);
            });

        } catch (error) {
            message.textContent = error.message;
        } finally {
            searchButton.disabled = false;
        }
    }

    searchButton.addEventListener('click', searchUnsplash);

    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            searchUnsplash();
        }
    });
</script>

</body>
</html>
