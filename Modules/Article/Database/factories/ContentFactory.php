<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Article\Entities\Content::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(3),
        'content'=>$faker->text,
        'author'=>'未来世界首富',
        'thumb'=>$faker->imageUrl(300,300),
        'click'=>mt_rand(1,1111),
        'category_id'=>mt_rand(1,4),
        'istop'=>1
    ];
});
