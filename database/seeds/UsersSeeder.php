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
            'nom' => 'anna',
            'prenom' => 'roxana',
            'sex' => true,
            'email' => 'anna_roxana@gmail.com',
            'tel' => '06060606',
        ]);

        $enc_pseudo = Crypt::encryptString( 'matalan' );

        DB::table('users')->insert([
        	'pseudo' => $enc_pseudo,
        	'password' => bcrypt('123456'),
            'nom' => 'mata',
            'prenom' => 'lan',
            'sex' => false,
            'email' => 'ma_ta_lan2@gmail.com',
            'tel' => '06060606',
        ]);
    }
}
