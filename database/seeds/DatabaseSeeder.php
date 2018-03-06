<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

    	DB::table('users')->insert([
    		'staffid' => 'PVPSITCSE1011'.rand(1111, 9999),
            'name' => 'Venkata Sai Katepalli',
            'email' => 'venkatasa@pvpsiddhartha.ac.in',
            'password' => '123456',
        ]);

        for ($i=0; $i < 30; $i++) { 
        	# code...
        	DB::table('users')->insert([
        		'staffid' => 'PVPSITCSE'.rand(1111, 9999),
	            'name' => str_random(10),
	            'email' => str_random(10).'@pvpsiddhartha.ac.in',
	            'password' => '123456'
	        ]);
        }

        for ($i=0; $i < 100; $i++) { 
        	# code...
        	$user = DB::table('users')->get()->random(1);
        	DB::table('workshops')->insert([
        		'staff_id' => rand(1,30),
	            'title' => str_random(30),
	            'venue' => 'vijayawada',
	            'from' => '2018-01-'.rand(1,12),
	            'to' => '2018-'.rand(1,12).'-01',
	            'applied_on' => '2018-'.rand(2,11).'-11',
	            'description' => str_random(60),
	            'status' => 'applied'
	        ]);
        }
    }
}
