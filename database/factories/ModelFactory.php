<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Member::class, function (Faker\Generator $faker) {

	$fname = $faker->firstName; 
	$lname = $faker->lastName;  
	$email = strtolower($fname.$lname.'@gmail.com');

    return [
        'first_name' => $fname,
        'last_name' => $lname,
        'email' => $email,
        'age' => $faker->NumberBetween(18,65)
    ];
});

$factory->define(App\Profile::class, function ($faker) use ($factory) {

    return [

    	'member_id' => factory(Member::class)->create()->id

    ];
});
