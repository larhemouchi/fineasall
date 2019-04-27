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
        $this->call(UsersSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(TheatreSeeder::class);
        $this->call(SalleSeed::class);
        $this->call(CatSeeder::class);
    }
}
