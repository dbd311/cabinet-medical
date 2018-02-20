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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Role_User::class, function (Faker\Generator $faker) { return [  ]; });

$factory->define(App\Admin::class, function (Faker\Generator $faker) { return [  ]; });

$factory->define(App\Permission::class, function (Faker\Generator $faker) { return [  ]; });

$factory->define(App\Permission_Role::class, function (Faker\Generator $faker) { return [  ]; });

$factory->define(App\Role::class, function (Faker\Generator $faker) { return [  ]; });

$factory->define(App\Models\Admin::class, function (Faker\Generator $faker) { return [  'username' => $faker->userName,  'password' => bcrypt($faker->password),  ]; });

$factory->define(App\Models\Appointment::class, function (Faker\Generator $faker) { 
    $maxCustomer_id = $max = \App\User::max('id');
    return [  'customer_id' => $faker->numberBetween(1, $maxCustomer_id),  'appointment_type' => $faker->numberBetween(1, 3),  'appointment_datetime' => App\Models\Appointment::nextAvailableAppointment(),  'motif' => $faker->word,  'package_id' => App\User::randomAgent(),  ]; 
    
});

$factory->define(App\Models\BookingDateTime::class, function (Faker\Generator $faker) { return [  'booking_datetime' => $faker->dateTimeBetween(),  ]; });

$factory->define(App\Models\TimeInterval::class, function (Faker\Generator $faker) { return [  'interval' => $faker->randomNumber(),  'metric' => $faker->word,  ]; })

;$factory->define(App\Models\Customer::class, function (Faker\Generator $faker) { return [  'first_name' => $faker->firstName,  'last_name' => $faker->lastName,  'contact_number' => $faker->word,  'email' => $faker->safeEmail,  'wants_updates' => $faker->boolean,  ]; });

$factory->define(App\Models\Package::class, function (Faker\Generator $faker) { return [  'package_name' => $faker->word,  'package_price' => $faker->randomFloat(),  'package_time' => $faker->randomFloat(),  'package_description' => $faker->text,  ]; });

$factory->define(App\Models\Configuration::class, function (Faker\Generator $faker) { return [  'time_interval_id' => $faker->randomNumber(),  ]; });

$factory->define(App\Models\Connexion::class, function (Faker\Generator $faker) { return [  'datetime' => $faker->dateTimeBetween(),  'ip' => $faker->word,  'city' => $faker->city,  'country' => $faker->country,  ]; });

$factory->define(App\Models\Holiday::class, function (Faker\Generator $faker) { return [  'date' => $faker->date(),  'note' => $faker->word,  ]; });

$factory->define(App\Settings::class, function (Faker\Generator $faker) { return [  ]; });

$factory->define(App\Users_Settings::class, function (Faker\Generator $faker) { return [  ]; });