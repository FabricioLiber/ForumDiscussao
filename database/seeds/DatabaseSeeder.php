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
//         $this->call(UsersTableSeeder::class);

        factory(\App\User::class,10)->create();
        factory(\App\Tema::class,10)->create();
        factory(\App\Postagem::class,20)->create();
        factory(\App\Resposta::class,20)->create();
    }
}
