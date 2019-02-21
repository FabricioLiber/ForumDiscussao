<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Tema::class, function (Faker $faker) {
    return [
        'nome' => $faker->sentence,
        'descricao' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'id_usuario'=>App\User::all()->random()->id,
        'qtd_postagens' => $faker->randomDigitNotNull,
    ];
});
$factory->define(App\Postagem::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->sentence,
        'descricao'=>$faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'id_tema'=>App\Tema::all()->random()->id,
        'id_usuario'=>App\User::all()->random()->id,
        'votos' => $faker->randomDigitNotNull,
    ];
});
$factory->define(App\Resposta::class, function (Faker $faker) {
    return [
        'descricao'=>$faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'id_usuario'=>App\User::all()->random()->id,
        'id_postagem'=>App\Postagem::all()->random()->id,
    ];
});
