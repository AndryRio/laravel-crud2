<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contacts')->insert([
            'name' => Str::random(10),
            'number' => '3425234231',
        ]);

        /*$factory->define(User::class, function (Faker\Generator $faker) {
           return [
               'name' => $faker->name,
           ];
        });

        $factory->define('users', function (Faker\Generator $faker) {
            return [
                'name' => $faker->name,
            ];
        });*/
    }
}
