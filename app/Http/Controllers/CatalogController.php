<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    // Menampilkan katalog produk untuk pengunjung
    public function index(Request $request)
    {
        // Mengambil semua kategori produk
        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        // Mengambil data produk
        $query = Product::query();

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Pencarian berdasarkan nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Mengurutkan dan mengambil produk
        $products = $query->latest()->get();

        return view('catalog.index', compact(
            'products',
            'categories'
        ));
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('catalog.detail', compact('product'));
    }
}
