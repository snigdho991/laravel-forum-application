<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel 5.5', 'slug' => str_slug('Laravel 5.5') ];
        $channel2 = ['title' => 'Spring Boot', 'slug' => str_slug('Spring Boot') ];
        $channel3 = ['title' => 'VueJs', 'slug' => str_slug('VueJs') ];
        $channel4 = ['title' => 'Java', 'slug' => str_slug('Java') ];
        $channel5 = ['title' => 'Data Stracture', 'slug' => str_slug('Data Stracture') ];
        $channel6 = ['title' => 'Algorithm', 'slug' => str_slug('Algorithm') ];
        $channel7 = ['title' => 'PHP', 'slug' => str_slug('PHP') ];
        $channel8 = ['title' => 'JSP & Servlet', 'slug' => str_slug('JSP & Servlet') ];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
    }
}
