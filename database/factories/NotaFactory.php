<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Nota;
use Faker\Generator as Faker;
use App\User;

$factory->define(Nota::class, function (Faker $faker) {

    $total=User::count();
    return [
        "titulo"=>$faker->name,
        "contenido"=>$faker->text($maxNbChars=50),
        "user_id"=>$faker->numberBetween(1,$total)
        
    ];
});
