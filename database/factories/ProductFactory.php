<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
	$title = $faker->sentence(rand(2, 5), true);
	$txt = $faker->realText(rand(50, 100));

	$createdAt = $faker->dateTimeBetween('-2 months', '-1 months');

	$data = [
		'category_id'  => rand(1, 10),
		'title'        => $title,
		'slug'         => Str::slug($title),
		'content_raw'  => $txt,
		'content_html' => $txt,
		'created_at'   => $createdAt,
		'updated_at'   => $createdAt,
	];

    return $data;
});