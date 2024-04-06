<?php

use Illuminate\Database\Seeder;
use App\Deal;

class DealTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            Deal::create([
                'deal_image' => 'deal.jpg',
            ]);
        }
    }
}
