<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Blog;
class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
        public function run()
        {
           $blog=array(
            [
             'user_id'=>'1',
             'tittle' => 'latest news1',
             'slug'=>'my world',
             'description' => "hi this is my first discribtion.",
             'status' =>  '1'
        ],
        [ 
            'user_id'=>'2',
            'tittle' => 'latest news1',  
            'slug'=>'hylooo', 
            'description' => "hi this is my second discribtion.",
            'status' =>  '2'  
        ],
    );
                // DB::table('posts')->insert($post);
                Blog::insert($blog);      
                // Admin::create($data);
        }   
    }
    

