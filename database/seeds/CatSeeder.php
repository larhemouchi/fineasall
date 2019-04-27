<?php

use Illuminate\Database\Seeder;

use App\Cat;

class CatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



    	$node = Cat::create([
	    'nom' => 'categories',
	    'taux' => 0,
	    'lettre' => 'x',

	    'children' => [
	        
	        [
	            'nom' => 'DERIERE',
	            'taux' => 50,
	            'lettre' => 'd'
	        ],

	        [
	            'nom' => 'ANDICAPE',
	            'taux' => 70,
	            'lettre' => 'a'
	        ],

	        [
	            'nom' => 'NORMAL',
	            'taux' => 100,
	            'lettre' => 'n'
	        ],

	        [
	            'nom' => 'VIP',
	            'taux' => 150,
	            'lettre' => 'v'
	        ],

	        [
	            'nom' => 'BALCON',
	            'taux' => 170,
	            'lettre' => 'b'
	        ]

	        
	    ]

	]);



    }
}
