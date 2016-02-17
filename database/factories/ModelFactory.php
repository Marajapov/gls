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

    $channels  = \Model\Channel\ModelName::all();
    $channel   = $channels[rand(0,count($channels)-1)];

    return [
        'name'       => $faker->name,
        'email'      => $faker->unique()->email,
        'password'   => bcrypt("123123"),
        'role'       => 'manager',
        'channel_id' => $channel->id(),
    ];
});

$factory->define(\Model\Post\ModelName::class, function (Faker\Generator $faker) {

    $categories = \Model\Category\ModelName::all();
    $category   = $categories[rand(0,count($categories)-1)];

    $channels  = \Model\Channel\ModelName::all();
    $channel   = $channels[rand(0,count($channels)-1)];

    return [
        'category_id' => $category->id(),
        'channel_id' => $channel->id(),
        'title' => $faker->unique()->sentence(),
        'content' => $faker->unique()->paragraph(),
        'description'  => $faker->unique()->sentence(),
        'published' => true,
        'general' => rand(0,1),
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

