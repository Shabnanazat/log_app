<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Hash;
use DB;
use Str;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {$admin=array(
    
    [
        'first_name'=>'Shanu',
        'last_name'=>'alz',
        'email'=>'shabna@gmail.com',
        'password'=> Hash::make('password')  
    ],
    [    
        'first_name'=>'chakkzShanu',
        'last_name'=>'alllu',
        'email'=>'appus@.com',
        'password'=> Hash::make('password')  
    ],
);
    Admin::insert($admin);
      
    }
}
