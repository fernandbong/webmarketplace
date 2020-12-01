<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nama_jasa' => $faker->sentence(2),
        'deskripsi' => $faker->sentence(10),
        'harga' => $faker->numberBetween(100000, 500000),
    ];
});
