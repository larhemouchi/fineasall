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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

*/


$factory->define(App\Theatre::class, function (Faker\Generator $faker) {

	$desc = $faker->unique()->sentence(5);
	$title = explode(' ',trim($desc))[0];
	$slug = str_slug($title, '-');

	return [
	        'titre' => $title,
	        'slug' => $slug,
	        'desc' => $desc,
	    ];
});


$factory->define(App\Salle::class, function (Faker\Generator $faker) {

	$adress = $faker->unique()->address();
	$nom = $faker->unique()->sentence();
	$slug = str_slug($nom, '-');

	return [
	        'nom' => $nom,
	        'slug' => $slug,
	        'adress' => $adress,
	    ];
});
