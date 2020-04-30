<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$t1 = 'Create a blog with Laravel 5.5';
    	$t2 = 'Create a blog with Spring';
    	$t3 = 'Create a blog with VueJs';
    	$t4 = 'Create a blog with PHP';
    	$t5 = 'Create a blog with Jsp/Servlet';

    	$c1 = 'Create a blog with Laravel 5.5Create a blog with Laravel 5.5Create a blog with Laravel 5.5Create a blog with Laravel 5.5';
    	$c2 = 'Create a blog with SpringCreate a blog with SpringCreate a blog with SpringCreate a blog with SpringCreate a blog with SpringCreate a blog with Spring';
    	$c3 = 'Create a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJsCreate a blog with VueJs';
    	$c4 = 'Create a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHPCreate a blog with PHP';
    	$c5 = 'Create a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/ServletCreate a blog with Jsp/Servlet';


        $d1 = [
				'title'      => $t1,
				'channel_id' => 1,
				'user_id'    => 2,
				'content'    => $c1,
				'slug'       => str_slug($t1)
			  ];

		$d2 = [
				'title'      => $t2,
				'channel_id' => 2,
				'user_id'    => 2,
				'content'    => $c2,
				'slug'       => str_slug($t2)
			  ];

		$d3 = [
				'title'      => $t3,
				'channel_id' => 3,
				'user_id'    => 2,
				'content'    => $c3,
				'slug'       => str_slug($t3)
			  ];

		$d4 = [
				'title'      => $t4,
				'channel_id' => 7,
				'user_id'    => 1,
				'content'    => $c4,
				'slug'       => str_slug($t4)
			  ];

		$d5 = [
				'title'      => $t5,
				'channel_id' => 8,
				'user_id'    => 1,
				'content'    => $c5,
				'slug'       => str_slug($t5)
			  ];
        


        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
        Discussion::create($d5);

    }
}
