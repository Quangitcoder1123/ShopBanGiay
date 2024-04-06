<?php

use Illuminate\Database\Seeder;
use App\Checkout;

class CheckoutTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=20; $i++){
            Checkout::create([
                'order_id' => $i,
                'pro_id' => $i,
                'quantity' => $i,
                'total_price' => 10000 * $i,
            ]);
        }
    }
}
