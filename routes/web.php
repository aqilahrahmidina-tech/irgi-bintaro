
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerAuthController;
use App\Http\Controllers\OwnerProductController;
use App\Http\Controllers\CatalogController;
use App\Models\Product;

// ==========================================
// HALAMAN PENGUNJUNG
// ==========================================

// Halaman Beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Katalog Produk
Route::get('/katalog', [CatalogController::class, 'index'])
    ->name('catalog.index');
// Halaman Detail Produk
Route::get('/produk/{product}', [CatalogController::class, 'show'])
    ->name('catalog.detail');
Route::get('/tentang', function () {
    return view('tentang');
})->name('about');

// ==========================================
// LOGIN OWNER
// ==========================================

Route::get('/owner/login', [OwnerAuthController::class, 'showLogin'])
    ->name('owner.login');

Route::post('/owner/login', [OwnerAuthController::class, 'login'])
    ->name('owner.login.submit');

// ==========================================
// DASHBOARD OWNER
// ==========================================

Route::get('/owner/dashboard', function () {

    $totalProducts = Product::count();

    $totalStock = Product::sum('stock');

    $totalCategories = Product::distinct('category')->count('category');

    return view('owner.dashboard', compact(
        'totalProducts',
        'totalStock',
        'totalCategories'
    ));

})->middleware('auth')->name('owner.dashboard');

Route::post('/owner/logout', [OwnerAuthController::class, 'logout'])
    ->middleware('auth')
    ->name('owner.logout');

// ==========================================
// KELOLA PRODUK OWNER
// ==========================================

Route::middleware('auth')->prefix('owner')->name('owner.')->group(function () {

    Route::get('/products', [OwnerProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/create', [OwnerProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [OwnerProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}/edit', [OwnerProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{product}', [OwnerProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [OwnerProductController::class, 'destroy'])
        ->name('products.destroy');

    Route::get('/unsplash/search', [OwnerProductController::class, 'searchUnsplash'])
        ->name('unsplash.search');

    Route::post('/unsplash/track', [OwnerProductController::class, 'trackUnsplashDownload'])
        ->name('unsplash.track');
});
