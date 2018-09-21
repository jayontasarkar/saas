<?php

use Illuminate\Database\Seeder;

class MailingListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
        $userIds = App\Models\User::pluck('id')->toArray();

        for($i = 0; $i <= 2; $i++) {
        	$list = App\Models\MailingList::create([
        		'name' => $faker->sentence(3),
                'user_id' => $faker->randomElement($userIds)
        	]);
        	$list->subscribers()->attach(
        		$this->shuffledSubscriberIds()
        	);
        }
    }

    private function shuffledSubscriberIds()
    {
    	$subscribers = App\Models\Subscriber::get();
    	$shuffled = $subscribers->shuffle();
    	$chunk = $shuffled->take(7)->pluck('id');

    	return array_values($chunk->all());
    }
}
