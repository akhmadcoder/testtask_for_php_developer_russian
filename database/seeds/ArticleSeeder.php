<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        $tags = App\Models\Tag::all();
        $last = count($tags) - 1;
        
        for($i = 0; $i < 20; $i++) {
            $time = $faker->dateTime();
	        $article = App\Models\Article::create([
                'title' => $faker->realText($maxNbChars = 50, $indexSize = 2),
	            'description' => $faker->text(200),
                'image' => $faker->image('public/images',400,300, null, false), 
	        	'created_at' => $time,
                'updated_at' => $time,
            ]);
            
            if (count($tags))
            {
                // 1. get random number (2 or 3 values)
                $size = rand(2,3);

                // 2. initialize new array
                $selected_tags = array_rand($tags->toArray(), $size);

                // 3. insert values to article_tag table
                for ($j=0; $j < $size; $j++) { 
                    $tag_id = $selected_tags[$j];
                    $article->tags()->attach($tags[$tag_id]);
                }
                
            }
            
	    }
    }
}
