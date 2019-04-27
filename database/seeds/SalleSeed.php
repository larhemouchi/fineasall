<?php

use Illuminate\Database\Seeder;

class SalleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Salle::class, 2)->create();
    }
}
