<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kemeja Pria Casual',
                'category' => 'Baju Lengan Pendek',
                'description' => 'Kemeja pria casual dengan desain modern dan nyaman digunakan sehari-hari.',
                'price' => 85000,
                'size' => 'M, L, XL',
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1543322748-33df6d3db806?w=600'
            ],
            [
                'name' => 'Kaos Polos Pria',
                'category' => 'Baju Lengan Pendek',
                'description' => 'Kaos polos pria berbahan nyaman untuk aktivitas sehari-hari.',
                'price' => 55000,
                'size' => 'S, M, L, XL',
                'stock' => 20,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600'
            ],
            [
                'name' => 'Blouse Wanita',
                'category' => 'Baju Lengan Panjang',
                'description' => 'Blouse wanita dengan tampilan simpel dan elegan.',
                'price' => 95000,
                'size' => 'S, M, L',
                'stock' => 12,
                'image' => 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=600'
            ],
            [
                'name' => 'Kemeja Wanita Formal',
                'category' => 'Baju Lengan Panjang',
                'description' => 'Kemeja wanita cocok untuk kegiatan formal maupun santai.',
                'price' => 110000,
                'size' => 'S, M, L, XL',
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?w=600'
            ],
            [
                'name' => 'Celana Pendek Pria',
                'category' => 'Celana Pendek',
                'description' => 'Celana pendek pria dengan desain sederhana dan nyaman.',
                'price' => 75000,
                'size' => 'M, L, XL',
                'stock' => 18,
                'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600'
            ],
            [
                'name' => 'Celana Pendek Wanita',
                'category' => 'Celana Pendek',
                'description' => 'Celana pendek wanita dengan model kasual.',
                'price' => 70000,
                'size' => 'S, M, L',
                'stock' => 14,
                'image' => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?w=600'
            ],
            [
                'name' => 'Celana Panjang Chino',
                'category' => 'Celana Panjang',
                'description' => 'Celana panjang chino dengan tampilan modern.',
                'price' => 135000,
                'size' => 'M, L, XL',
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=600'
            ],
            [
                'name' => 'Celana Panjang Wanita',
                'category' => 'Celana Panjang',
                'description' => 'Celana panjang wanita yang nyaman untuk berbagai kegiatan.',
                'price' => 125000,
                'size' => 'S, M, L',
                'stock' => 12,
                'image' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=600'
            ],
            [
                'name' => 'Kaos Anak Laki-Laki',
                'category' => 'Baju Anak',
                'description' => 'Kaos anak laki-laki dengan desain menarik.',
                'price' => 45000,
                'size' => '5 Tahun, 6 Tahun, 7 Tahun',
                'stock' => 20,
                'image' => 'https://images.unsplash.com/photo-1519238263530-99bdd11df2ea?w=600'
            ],
            [
                'name' => 'Dress Anak Perempuan',
                'category' => 'Baju Anak',
                'description' => 'Dress anak perempuan dengan model lucu dan nyaman.',
                'price' => 85000,
                'size' => '5 Tahun, 6 Tahun, 7 Tahun',
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1518837695005-2083093ee35b?w=600'
            ],
            [
                'name' => 'Setelan Bayi',
                'category' => 'Baju Bayi',
                'description' => 'Setelan bayi dengan bahan lembut dan nyaman.',
                'price' => 65000,
                'size' => '0-6 Bulan, 6-12 Bulan',
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=600'
            ],
            [
                'name' => 'Jumper Bayi',
                'category' => 'Baju Bayi',
                'description' => 'Jumper bayi dengan desain sederhana dan nyaman.',
                'price' => 70000,
                'size' => '0-6 Bulan, 6-12 Bulan',
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1519238263530-99bdd11df2ea?w=600'
            ],
            [
                'name' => 'Gamis Wanita',
                'category' => 'Baju Muslim',
                'description' => 'Gamis wanita dengan desain anggun dan elegan.',
                'price' => 175000,
                'size' => 'M, L, XL',
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1585487000160-6ebcfceb0d03?w=600'
            ],
            [
                'name' => 'Tunik Muslim Wanita',
                'category' => 'Baju Muslim',
                'description' => 'Tunik muslim wanita dengan model modern.',
                'price' => 120000,
                'size' => 'M, L, XL',
                'stock' => 12,
                'image' => 'https://images.unsplash.com/photo-1483985988355-763728e1935b?w=600'
            ],
            [
                'name' => 'Baju Koko Putih',
                'category' => 'Baju Koko',
                'description' => 'Baju koko putih dengan desain simpel dan rapi.',
                'price' => 115000,
                'size' => 'M, L, XL',
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=600'
            ],
            [
                'name' => 'Baju Koko Modern',
                'category' => 'Baju Koko',
                'description' => 'Baju koko modern untuk kegiatan ibadah dan acara keluarga.',
                'price' => 145000,
                'size' => 'M, L, XL',
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600'
            ],
            [
                'name' => 'Kaos Oversize Pria',
                'category' => 'Baju Lengan Pendek',
                'description' => 'Kaos oversize dengan gaya streetwear.',
                'price' => 90000,
                'size' => 'M, L, XL',
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=600'
            ],
            [
                'name' => 'Kemeja Flanel Pria',
                'category' => 'Baju Lengan Panjang',
                'description' => 'Kemeja flanel pria dengan motif kasual.',
                'price' => 125000,
                'size' => 'M, L, XL',
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=600'
            ],
            [
                'name' => 'Celana Jogger Pria',
                'category' => 'Celana Panjang',
                'description' => 'Celana jogger pria yang nyaman untuk aktivitas santai.',
                'price' => 100000,
                'size' => 'M, L, XL',
                'stock' => 12,
                'image' => 'https://images.unsplash.com/photo-1473966968600-fa801b869a1a?w=600'
            ],
            [
                'name' => 'Dress Casual Wanita',
                'category' => 'Baju Lengan Panjang',
                'description' => 'Dress casual wanita dengan tampilan modis.',
                'price' => 150000,
                'size' => 'S, M, L',
                'stock' => 8,
                'image' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=600'
            ],
        ];

        foreach ($products as $item) {
            Product::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }

        $this->command->info('20 produk berhasil dimasukkan ke database.');
    }
}
