<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++){
            Post::create([
                'title' => 'Portable Fashion for women',

                'content' => '<p><span style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif; font-size: 14px; font-style: italic;">MCSE boot 
                camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can 
                get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a 
                self-imposed MCSE training.</span><br><p><img style="width: 360px;" data-filename="post-img1.jpg" 
                src="http://localhost:8000/images/6088df79580c1.jpeg">&nbsp;<img style="width: 360px;" data-filename="post-img2.jpg" 
                src="http://localhost:8000/images/6088df79587b1.jpeg"></p><p style="font-family: Roboto, sans-serif; color: rgb(119, 119, 119); 
                font-size: 14px; background-color: rgb(249, 249, 255);">MCSE boot camps have its supporters and its detractors. 
                Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study 
                materials yourself at a fraction of the camp price. However, who has the willpower.</p><p style="font-family:
                 Roboto, sans-serif; color: rgb(119, 119, 119); font-size: 14px; background-color: rgb(249, 249, 255);">MCSE 
                 boot camps have its supporters and its detractors. Some people do not understand why you should have to spend 
                 money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, 
                 who has the willpower.</p><p></p><p></p></p>
                    ',

                'image' => '1619583094-.jpg',

                'cat_id' => 1,
                'user_id' => 24, 
                'like_number' => 20,
                'comment_number' => 20,
                'view_number' => 20,
                'status' => 0,

                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.',
            ]);
        }
    }
}
