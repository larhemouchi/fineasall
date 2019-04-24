<?php

use Illuminate\Database\Seeder;


//use Faker\Provider\Internet as Slug;


class TheatreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Theatre::class, 2)->create();
    }
}
