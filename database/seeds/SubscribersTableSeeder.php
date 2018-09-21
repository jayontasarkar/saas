<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $list = [];
        for($i = 0; $i < 25; $i++) {
        	array_push($list, ['name' => $faker->name, 'email' => $faker->unique()->email]);
        }
        App\Models\Subscriber::insert($list);
    }
}
