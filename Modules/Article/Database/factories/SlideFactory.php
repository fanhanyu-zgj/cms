<?php

use Faker\Generator as Faker;

$factory->define(\Modules\Article\Entities\Slide::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'pic'=>$faker->imageUrl(600,300),
        'click'=>mt_rand(1,1111),
        'url'=>'http://www.baidu.com',
        'enable'=>1,
    ];
});
