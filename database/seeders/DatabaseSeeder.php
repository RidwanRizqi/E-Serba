<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'phone' => '085600846525',
            'email' => 'admin@gmail.com',
            'is_active' => true,
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'user',
            'phone' => '085600841234',
            'email' => 'user@gmail.com',
            'is_active' => true,
            'role' => 'user',
        ]);

        Category::create([
            'name' => 'Kecantikan',
            'description' => 'Produk kecantikan kami didesain untuk meningkatkan keindahan alami Anda. Dari kosmetik berkualitas tinggi hingga perawatan kulit yang inovatif, kami menawarkan solusi kecantikan yang membantu Anda meraih penampilan terbaik Anda.',
        ]);

        Category::create([
            'name' => 'Barang Keseharian',
            'description' => 'Temukan kenyamanan dalam produk sehari-hari kami yang praktis dan fungsional. Dari peralatan rumah tangga hingga aksesori keseharian, kami menyediakan barang-barang berkualitas untuk memenuhi kebutuhan sehari-hari Anda.',
        ]);

        Category::create([
            'name' => 'Kesehatan',
            'description' => 'Prioritaskan kesehatan Anda dengan rangkaian produk kesehatan kami. Dari suplemen nutrisi hingga peralatan medis, kami berkomitmen untuk menyediakan solusi kesehatan yang mendukung gaya hidup sehat dan aktif.',
        ]);

        Category::create([
            'name' => 'Pertanian',
            'description' => 'Produk pertanian kami didesain untuk mendukung pertanian modern. Dari peralatan pertanian hingga pupuk berkualitas tinggi, kami menyediakan solusi untuk meningkatkan produktivitas dan hasil panen.',
        ]);

        Category::create([
            'name' => 'Otomotif',
            'description' => 'Jelajahi dunia otomotif dengan produk-produk kami yang inovatif. Dari aksesori mobil hingga peralatan perawatan kendaraan, kami menyediakan produk berkualitas tinggi untuk menjaga kendaraan Anda tetap dalam kondisi optimal.',
        ]);

        Supplier::create([
            'name' => 'Shopee',
            'email' => 'shopee@gmail.com',
            'phone' => '085600846525',
            'company' => 'Shopee',
            'address' => 'Jakarta, Indonesia',
        ]);

        Product::create([
            'name' => 'Lipstik',
            'description' => 'Lipstik Matte',
            'quantity' => 100,
            'price' => 50000,
            'image' => 'product-images/lipstik.jpg',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Blush On',
            'description' => 'Blush On Matte',
            'quantity' => 500,
            'price' => 30000,
            'image' => 'product-images/blushon.jpg',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Minyak Goreng',
            'description' => 'Minyak Goreng 1 Liter',
            'quantity' => 1000,
            'price' => 20000,
            'image' => 'product-images/minyak.jpg',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Sabun Mandi',
            'description' => 'Sabun Mandi 1 Liter',
            'quantity' => 1000,
            'price' => 10000,
            'image' => 'product-images/sabun.jpg',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Vitamin C',
            'description' => 'Vitamin C 1000mg',
            'quantity' => 1000,
            'price' => 50000,
            'image' => 'product-images/vitaminc.jpg',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Obat Batuk',
            'description' => 'Obat Batuk 100ml',
            'quantity' => 500,
            'price' => 20000,
            'image' => 'product-images/obatbatuk.jpg',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Pupuk',
            'description' => 'Pupuk 1kg',
            'quantity' => 1000,
            'price' => 10000,
            'image' => 'product-images/pupuk.jpg',
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'Obat Hama',
            'description' => 'Obat Hama 1kg',
            'quantity' => 50,
            'price' => 20000,
            'image' => 'product-images/obathama.jpg',
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'Kunci Roda',
            'description' => 'Kunci Roda 1 Set',
            'quantity' => 300,
            'price' => 50000,
            'image' => 'product-images/kunci.jpg',
            'category_id' => 5,
        ]);

        Product::create([
            'name' => 'Spare Part Mobil',
            'description' => 'Spare Part Mobil',
            'quantity' => 50,
            'price' => 100000,
            'image' => 'product-images/sparepart.jpg',
            'category_id' => 5,
        ]);

    }
}
