<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Reza',
            'email' => 'reza@gmail.com',
            'password' => md5('password'),
        ]);

        Category::create([
            'nama' => 'Alat tulis'
        ]);
    }
}
