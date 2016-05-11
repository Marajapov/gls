<?php

$factory->define(\Model\User\ModelName::class, function (Faker\Generator $faker) {

    return [
        'name'       => $faker->name,
        'email'      => $faker->unique()->email,
        'password'   => bcrypt("123123"),
        'role'       => 'manager',
    ];
});

