<?php

use Illuminate\Database\Seeder;
use App\Good;

class GoodsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
        	$good = new \App\Good();
        	$faker = \Faker\Factory::create();

		    $good->category_id = rand(1,5);
		    $good->name = $faker->name;
		    $good->description = $faker->realText($maxNbChars = 150, $indexSize = 2);
		    $good->image = $faker->image('public/img/cover', 640, 480, 'cats', false);
		    $good->price = rand(150,1500);
		    $good->save();
        }
    }
}
