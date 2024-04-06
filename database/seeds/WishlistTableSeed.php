<?php

use Illuminate\Database\Seeder;
use App\Wishlist;

class WishlistTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            Wishlist::create([
                'user_id' => 1,
                'pro_id' => $i,
            ]);
        }
    }
}
