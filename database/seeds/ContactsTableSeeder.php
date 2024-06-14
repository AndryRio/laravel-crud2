<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*DB::table('contacts')->insert([
            'name' => Str::random(10),
            'number' => random_int(3000000000, 3999999999),
        ]);*/

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

        factory(App\Contact::class, 10)->create();
    }
}
