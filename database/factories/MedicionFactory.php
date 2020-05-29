<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medicion;
use App\Raspberry;
use Faker\Generator as Faker;

$factory->define(Medicion::class, function (Faker $faker) {
    return [
        'fecha_y_hora'  =>  $faker  ->  unique()->dateTime,
        'id_raspberry'  =>  Raspberry::inRandomOrder()->value('ID_Raspberry'),
        'cloro'         =>  $faker  -> randomFloat($nbMaxDecimals = 2, $min = 0, $max = 3),
        'ph'            =>  $faker  -> randomFloat($nbMaxDecimals = 2, $min = 6, $max = 9)
    ];
});
