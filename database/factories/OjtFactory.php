<?php

use Faker\Generator as Faker;

$factory->define(App\Ojt::class, function (Faker $faker) {
    return [
        'user_id'           => $faker->randomDigitNotNull,
        'department_id'     => $faker->numberBetween(1, 23),
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'm_i'               => $faker->randomLetter,
        'bday'              => $faker->date,
        'gender'            => $faker->randomElement([0, 1]),
        'address'           => $faker->address,
        'course'            => $faker->randomElement(['Bachelor of Arts in Communication Arts', 'Bachelor of Arts in English', 'Bachelor of Arts in Psychology', 'Bachelor of Science in Criminology', 'Bachelor of Physical Education', 'Bachelor of Science in Accountancy', 'Bachelor of Science in Accounting Technology', 'Bachelor of Science in Entrepreneurship', 'Bachelor of Science in Hotel and Restaurant Management', 'Bachelor of Science in Business Administration', 'Bachelor of Science in Civil Engineering', 'Bachelor of Science in Electrical Engineering', 'Bachelor of Science in Computer Science', 'Bachelor in Public Administration', 'Bachelor of Science in Chemistry']),
        'school'            => $faker->company,
        'no_hrs'            => $faker->numberBetween(200, 500),
        'access_pass_app'  => $faker->randomElement([0,1]),
        'school_endorsement'=> $faker->randomElement([0,1]),
        'dole'              => $faker->randomElement([0,1]),
        'cv'                => $faker->randomElement([0,1]),
        'brgy_police'       => $faker->randomElement([0,1]),
        'pic2x2'            => $faker->randomElement([0,1])
    ];
});
