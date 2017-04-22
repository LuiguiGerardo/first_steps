<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class)->create([
        	'name'=>'Luigui',
            'username'=>'Lgerardo',
        	'role'=>'admin',
        	'email'=>'luiguies.20@gmail.com', 
        	'password'=>bcrypt('123456'),
            'active'=>true
        	]);
        factory(App\User::class,49)->create();
        
    }
}
