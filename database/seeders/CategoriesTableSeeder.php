<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create(['Category' => 'Champions', 'Description' => 'Description of Champions']);
        Category::create(['Category' => 'UEFA', 'Description' => 'Description of UEFA']);
        Category::create(['Category' => 'Maintain', 'Description' => 'Description of Maintain']);
        Category::create(['Category' => 'Prospect', 'Description' => 'Description of Prospect']);
    }
}
