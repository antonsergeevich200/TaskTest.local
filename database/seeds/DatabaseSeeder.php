<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductCategoriesTableSeeder::class);
        factory(\App\Models\Product::class, 50)->create();
    }
}
