<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = ['IOS Developer', 'Web Developer', 'Software Engineer', 'Mobile Developer'];

        foreach($categories as $id => $categories)
            Category::create(['name' => $categories]);
    }
}
