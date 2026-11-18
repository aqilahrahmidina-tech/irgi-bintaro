<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class OwnerProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::latest()->get();

        return view('owner.products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('owner.products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'size' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|url',
        ]);

        Product::create($validated);

        return redirect()
            ->route('owner.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit produk
    public function edit(Product $product)
    {
        return view('owner.products.edit', compact('product'));
    }

    // Memperbarui produk
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'size' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|url',
        ]);

        $product->update($validated);

        return redirect()
            ->route('owner.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('owner.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    // Mencari gambar dari Unsplash
    public function searchUnsplash(Request $request)
    {
        $request->validate([
            'q' => 'required|string|max:100',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Client-ID ' . config('services.unsplash.access_key'),
            'Accept-Version' => 'v1',
        ])->get('https://api.unsplash.com/search/photos', [
            'query' => $request->q,
            'per_page' => 12,
            'orientation' => 'portrait',
        ]);

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Gagal mengambil gambar dari Unsplash.',
            ], 502);
        }

        $photos = collect($response->json('results'))->map(function ($photo) {
            return [
                'id' => $photo['id'],
                'image' => $photo['urls']['regular'],
                'alt' => $photo['alt_description'] ?? 'Foto pakaian',
                'photographer' => $photo['user']['name'],
                'photographer_url' => $photo['user']['links']['html'],
            ];
        });

        return response()->json($photos);
    }

    // Mencatat pemilihan gambar Unsplash
    public function trackUnsplashDownload(Request $request)
    {
        $request->validate([
            'photo_id' => 'required|alpha_dash|max:100',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Client-ID ' . config('services.unsplash.access_key'),
            'Accept-Version' => 'v1',
        ])->get(
            'https://api.unsplash.com/photos/' . $request->photo_id . '/download'
        );

        if (!$response->successful()) {
            return response()->json([
                'message' => 'Gagal mencatat pemilihan foto.',
            ], 502);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
