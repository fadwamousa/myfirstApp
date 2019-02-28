<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class PostsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	/*$faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('posts')->insert([
	            'title' => $faker->title,
	            'body' => $faker->paragraph,
	            
	        ]);
	}*/

    	for($i=0;$i<=20;$i++){
    		$post = new Post();
    		$post->title = "Hello Post ".rand(0,20);
    		$post->body  = "This is Post ".rand(0,20);
    		$post->is_published = rand(0,1);
            $post->cover_image  = 'image'.rand(50,158);
    		$post->save();
    	}
        
    }
}
