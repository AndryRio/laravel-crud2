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
            'name' => 'John Ross',
            'email' => 'ross@gmail.com',
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
