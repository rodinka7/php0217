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

		    $good->integer('category_id')->unsigned();
		    $good->foreign('category_id')->references('id')->on('categories');
		    $good->name = $faker->name;
		    $good->art = $faker->numberBetween($min = 10000, $max = 90000);
		    $good->producer = $faker->producer;
		    $good->count = $faker->numberBetween($min = 5, $max = 20);
		    $good->price = numberBetween($min = 300, $max = 2000);
		    $good->save();
        }
    }
}
