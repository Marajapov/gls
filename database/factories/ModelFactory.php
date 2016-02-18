<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\Model\User\ModelName::class, function (Faker\Generator $faker) {

    return [
        'name'       => $faker->name,
        'email'      => $faker->unique()->email,
        'password'   => bcrypt("123123"),
        'role'       => 'manager',
    ];
});

// // Category
// $factory->define(\Model\Category\ModelName::class, function (Faker\Generator $faker) {
//     return [
//         'name' => $faker->word(),
//         'title' => $faker->word(),

//         'published' => true,
//     ];
// });

$factory->define(\Model\Tag\Tag::class, function (Faker\Generator $faker) {

    return [
        'name'       => $faker->word,
    ];
});

