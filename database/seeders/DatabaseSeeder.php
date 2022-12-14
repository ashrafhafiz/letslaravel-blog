<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

         \App\Models\User::factory()->create([
             'name' => 'Administrator',
             'email' => 'admin@example.com',
             'password' => Hash::make('password'),
             'status' => 'admin',

         ]);

         \App\Models\User::factory(15)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(CategoryTranslationsTableSeeder::class);
    }
}
