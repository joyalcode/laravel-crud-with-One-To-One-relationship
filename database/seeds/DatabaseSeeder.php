<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
		foreach(range(1, 10) as $index)
        {
			$fname = $faker->firstName; 
			$lname = $faker->lastName;  
			$email = strtolower($fname.$lname.'@gmail.com');

			$member = [
				        'first_name' => $fname,
				        'last_name' => $lname,
				        'email' => $email,
				        'age' => $faker->NumberBetween(18,65)
			    	];

			$member = App\Member::create($member);

			$profile = [
							'member_id' => $member->id,
							'phone' => $faker->phoneNumber,
							'address' => $faker->streetAddress.', '.$faker->city,
							'company' => $faker->company,
							'notes' => $member->id
					];	

			App\Profile::create($profile);		
		}		
    }
}
