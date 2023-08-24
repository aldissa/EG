<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'al';
        $user->email = 'al@gmail.com';
        $user->password = bcrypt('al');
        $user->role = 'admin';
        $user->save();

        $user = new User();
        $user->name = 'l';
        $user->email = 'l@gmail.com';
        $user->password = bcrypt('l');
        $user->role = 'customer';
        $user->save();

        $kategori = new Kategori();
        $kategori->name = 'Adventure';
        $kategori->save();

        $kategori = new Kategori();
        $kategori->name = 'Sports';
        $kategori->save();

        $kategori = new Kategori();
        $kategori->name = 'Simulations';
        $kategori->save();
    }
}
