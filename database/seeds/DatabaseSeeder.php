<?php

use Illuminate\Database\Seeder;
use App\Tema;

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
        factory(Tema::class,10)->create();
    }
}
