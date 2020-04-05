<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\User::class,function (Faker $faker)
{
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'dateOfBirth' => $faker->dateTime,
        'password' => $faker->password,

    ];
});

$factory->define(\App\Category::class,function (Faker $faker){
    return [
        'category_name' => $faker->unique()->name
    ];
});

$factory->define(\App\Post::class,function (Faker $faker){
    return [

        'user_id' => $faker->numberBetween(1,3),
        'comment_count' => $faker->numberBetween(1,10),
        'content' => $faker->paragraph,
        'title' => $faker->title,
    ];
});

$factory->define(\App\Comment::class,function (Faker $faker){
    return [
        'post_id' => $faker->numberBetween(1,3),
        'user_id' => $faker->numberBetween(1,3),
        'content' => $faker->paragraph,
    ];
});
$factory->define(\App\Order::class,function (Faker $faker){
    return [
        'customer_address' => $faker->unique()->address,
        'customer_city' => $faker->unique()->city,
        'customer_country' => $faker->unique()->country,
        'customer_email'   =>  $faker->unique()->email,
        'customer_name' => $faker->unique()->name,
        'customer_phone'=>  $faker->unique()->phoneNumber,
        'customer_postcode'=> $faker->unique()->postcode,
        'method'=> $faker->numberBetween(1,5),
        'status'=> $faker->numberBetween(1,5),
        'total'=> $faker->numberBetween(1,5),
    ];
});




$factory->define(\App\Product::class,function (Faker $faker){
    return [
        'price_id' => $faker->numberBetween(1,3),
        'desc' => $faker->unique()->paragraph(),
        'name' => $faker->unique()->name(),
        'stock' => $faker->numberBetween(20,99),
    ];
});





