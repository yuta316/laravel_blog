<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['music', 'sports', 'movie', 'book', 'study'];
        foreach($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
