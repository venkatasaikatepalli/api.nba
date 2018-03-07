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
            'email' => 'venkatasaisoft@gmail.com',
            'password' => '$2y$10$ou3.gXPuntz4qn30..fyHeccR5irXVRXRQTzdyBFeNZmUTlyi3/bW',
            'remember_token' => str_random(10),
        ]);

        for ($i=0; $i < 30; $i++) { 
        	DB::table('users')->insert([
        		'staffid' => 'PVPSITCSE'.rand(1111, 9999),
	            'name' => str_random(10),
	            'email' => str_random(10).'@pvpsiddhartha.ac.in',
	            'password' => '$2y$10$ou3.gXPuntz4qn30..fyHeccR5irXVRXRQTzdyBFeNZmUTlyi3/bW',
                'remember_token' => str_random(10)
	        ]);
        }

        for ($i=0; $i < 100; $i++) { 
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

        $year = 2010;
        $end = 11;
        for ($i=0; $i < 10; $i++) { 
            # code...
            $year++;
            $end++;

            DB::table('sfrs')->insert([
                'accademic_year' => $year.'-'.$end,
                'ug_programs' => 1,
                'pg_programs' => 1,
                'ug2_students' => rand(130, 140),
                'ug3_students' => rand(130, 140),
                'ug4_students' => rand(130, 140),
                'pg1_students' => rand(3, 10),
                'pg2_students' => rand(3, 10),
                ]);
        }
    }
}
