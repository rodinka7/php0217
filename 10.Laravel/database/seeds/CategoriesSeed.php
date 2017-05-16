<?php

use Illuminate\Database\Seeder;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
        	$category = new \App\Category();
        	$faker = \Faker\Factory::create();

		    $category->name = $faker->name;
            $category->description = $faker->text();
		    $category->save();
        }
    }
}
