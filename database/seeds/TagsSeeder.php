<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++) {
	        $time = $faker->dateTime();
	        App\Models\Tag::create([
                'name' => $faker->word,
                'created_at' => $time,
                'updated_at' => $time,
	        ]);
        }
        
    }
}
