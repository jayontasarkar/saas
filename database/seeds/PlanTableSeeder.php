<?php

use Illuminate\Database\Seeder;

use App\Models\Plan;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Monthly',
                'slug' => 'monthly',
                'gateway_id' => 'plan_DddZPGhkC5RPQM',
                'price' => 6.00,
                'active' => true,
                'teams_enabled' => false,
                'teams_limit' => null,
            ],
            [
                'name' => 'Yearly',
                'slug' => 'yearly',
                'gateway_id' => 'plan_DddasLUBTVHv2M',
                'price' => 60.00,
                'active' => true,
                'teams_enabled' => false,
                'teams_limit' => null,
            ],
            [
                'name' => 'Monthly for 10 users',
                'slug' => 'monthly-for-10-users',
                'gateway_id' => 'plan_DddbyN0wcs4dmj',
                'price' => 55.00,
                'active' => true,
                'teams_enabled' => true,
                'teams_limit' => 10,
            ],
        ];

        Plan::insert($plans);
    }
}
