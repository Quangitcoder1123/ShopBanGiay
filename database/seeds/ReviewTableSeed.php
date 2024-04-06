<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 15; $i++){
            Review::create([
                'user_id' => $i,
                'pro_id' => $i,
                'comment' => 'Sản phẩm rất tốt',
                'rate' => 4,
            ]);
        }
    }
}
