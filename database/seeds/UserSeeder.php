<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);*/

        /*factory(App\User::class, 50)->create()->each(function ($user) {
            $user->posts()->save(factory(App\User::class)->make());
        });*/

        factory(App\User::class, 50)->create();
    }
}
