<?php

use Illuminate\Database\Seeder;

class PostsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
        	$post = new \App\Post();
        	$faker = \Faker\Factory::create();

		    $post->name = $faker->name;
		    $post->description = $faker->text;
		    $post->image = $faker->image('public/img/news', 640, 480, 'cats', false);
		    $post->save();
        }
    }
}
