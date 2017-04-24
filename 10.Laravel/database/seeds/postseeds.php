<?php

use Illuminate\Database\Seeder;

class postseeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
        	$faker = \Faker\Factory::create();
        	$post = new \App\Post();

        	$post->title = $faker->title;
        	$post->content = $faker->realText();
        	$post->user_id = rand(1,5);
        	$post->save();
        }
    }
}
