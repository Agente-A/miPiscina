<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Piscina;
use App\CondicionPiscina;
use App\Administrador;
use App\Raspberry;
use Faker\Generator as Faker;

$factory->define(Piscina::class, function (Faker $faker) {
    return [
        'nombre'        =>  $faker  ->  regexify('Piscina [A-Z0-9]+'),
        'tamano'        =>  $faker  ->  numberBetween($min = 1000, $max = 9000),
        'condicion'     =>  CondicionPiscina::inRandomOrder()->value('ID_CONDICION'),
        'id_admin'      =>  Administrador::inRandomOrder()->value('ID_ADMIN'),
    ];
});
 