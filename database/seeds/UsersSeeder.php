<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $enc_pseudo = Crypt::encryptString( 'roxy' );

        DB::table('users')->insert([
        	'pseudo' => $enc_pseudo,
        	'password' => bcrypt('123456'),
            'nom' => 'larhemouchi',
            'prenom' => 'zouhair',
            'sex' => true,
            'email' => 'admin1@roxy.com',
            'tel' => '06060606',
        ]
    );

        $enc_pseudo = Crypt::encryptString( 'admino' );

        DB::table('users')->insert(
        [
            'pseudo' => $enc_pseudo,
            'password' => bcrypt('123456'),
            'nom' => 'De Henau',
            'prenom' => 'A Marie',
            'sex' => true,
            'email' => 'admin2@roxy.com',
            'tel' => '060606506',
        ]

        );

        $enc_pseudo = Crypt::encryptString( 'matalan' );

        DB::table('users')->insert([
        	'pseudo' => $enc_pseudo,
        	'password' => bcrypt('123456'),
            'nom' => 'VO',
            'prenom' => 'Didier',
            'sex' => false,
            'email' => 'zouhair@gmail.com',
            'tel' => '06060606',
        ]);
    }
}
