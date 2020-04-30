<?php

use Illuminate\Database\Seeder;
use App\Reply;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$c1 = 'Create a blog with Laravel 5.5Create a blog with Laravel 5.5Create a blog with Laravel 5.5Create a blog with Laravel 5.5';
    	$c2 = 'Create a blog with SpringCreate a blog with SpringCreate a blog with SpringCreate a blog with SpringCreate a blog with SpringCreate a blog with Spring';
    	$c3 = 'Create a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJs';
    	$c4 = 'Create a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHP';


        $r1 = [
				'user_id'       => 1,
				'discussion_id' => 1,
				'content'       => $c1
			  ];

		$r2 = [
				'user_id'       => 1,
				'discussion_id' => 2,
				'content'       => $c2
			  ];

		$r3 = [
				'user_id'       => 2,
				'discussion_id' => 3,
				'content'       => $c3
			  ];

		$r4 = [
				'user_id'       => 2,
				'discussion_id' => 4,
				'content'       => $c4
			  ];


		
		Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
    }
}
