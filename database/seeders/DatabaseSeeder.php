<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(RoleSeeder::class);

        DB::table('categories')->insert([
            ['nama' => 'Pantai'],
            ['nama' => 'Hutan'],
            ['nama' => 'Kampung Wisata'],
            ['nama' => 'Pulau'],
            ['nama' => 'Wisata Kuliner'],
            ['nama' => 'Danau'],
            ['nama' => 'Wisata Edukasi'],
        ]);


        DB::table('tours')->insert([
            [
                'category_id' => 1,
                'nama_wisata' => 'Pantai Tanjung Pasir',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Pantai dengan pemandangan laut lepas dan perahu nelayan.',
                'harga' => 50000.00,
            ],
            [
                'category_id' => 1,
                'nama_wisata' => 'Pantai Kosambi',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Pantai yang menawarkan ketenangan dengan suasana alami.',
                'harga' => 40000.00,
            ],
            [
                'category_id' => 3,
                'nama_wisata' => 'Kampung Cisadane',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Wisata edukasi di sepanjang sungai Cisadane.',
                'harga' => 30000.00,
            ],
            [
                'category_id' => 2,
                'nama_wisata' => 'Hutan Mangrove Mauk',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Wisata alam dengan keindahan ekosistem mangrove.',
                'harga' => 20000.00,
            ],
            [
                'category_id' => 4,
                'nama_wisata' => 'Pulau Panjang',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Pulau kecil dengan suasana tenang dan alami.',
                'harga' => 100000.00,
            ],
            [
                'category_id' => 5,
                'nama_wisata' => 'Wisata Kuliner Mauk',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Tempat menikmati makanan khas Banten.',
                'harga' => 30000.00,
            ],
            [
                'category_id' => 6,
                'nama_wisata' => 'Danau Mauk',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Danau indah dengan fasilitas wisata air.',
                'harga' => 50000.00,
            ],
            [
                'category_id' => 5,
                'nama_wisata' => 'Kebun Durian',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Wisata petik durian langsung dari pohon.',
                'harga' => 60000.00,
            ],
            [
                'category_id' => 7,
                'nama_wisata' => 'Kampung Batik Mauk',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Tempat belajar membatik dengan desain khas Mauk.',
                'harga' => 40000.00,
            ],
            [
                'category_id' => 1,
                'nama_wisata' => 'Pantai Tanjung Sepat',
                'tempat_wisata' => 'Mauk, Banten',
                'deskripsi' => 'Pantai dengan pemandangan matahari terbenam yang indah.',
                'harga' => 45000.00,
            ],
        ]);
    }
}
