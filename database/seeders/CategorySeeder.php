<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use DB;
use Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat=array(
    
        [
            'Category_name'=>'Netstager',
            'status'=>'1',
        ],
        [
            'Category_name'=>'sigma ',
            'status'=>'1',
        ],
    );
            Category::insert($cat);
    }
    }


