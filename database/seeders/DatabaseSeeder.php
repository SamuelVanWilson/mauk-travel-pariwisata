<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'no_handphone' => '112233',
            'password' => Hash::make('admin@admin'),
            'role_id' => 2,
        ]);
        Category::create(["nama" => "Pantai"]);
    }
}
