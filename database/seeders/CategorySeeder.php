<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::create([
        //     'name' => 'Deportes',
        //     'slug' => 'deportes'
        // ]);

        // $category = new Category();
        // $category->name = 'Comida';
        // $category->slug = 'comida';
        // $category->save();

        Category::factory(10)->create();

    }
}
