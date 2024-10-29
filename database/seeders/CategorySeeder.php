<?php

// database/seeders/CategorySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Mechanic', 'Beauty', 'Medical', 'Education', 'Construction', 'Hospitality'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
