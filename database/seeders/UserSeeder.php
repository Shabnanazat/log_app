<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Hash;
use DB;
use Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            $user = array(

            [   
               'id'=> 1,
                'email'=>'appuz@gmail.com',
                'password'=> Hash::make('password'),
                'first_name'=>'shanu ',
                'last_name'=>'shan',
                'phone_number'=>'123488590',
            ],
            [
                'id'=> 2,
                'email'=>'sidil@gmail.com',
                'password'=> Hash::make('password'),
                'first_name'=>'sidil',
                'last_name'=>'molz',
                'phone_number'=>'123499990',
 
            ]
            );
            User::insert($user);
        
    }
}
