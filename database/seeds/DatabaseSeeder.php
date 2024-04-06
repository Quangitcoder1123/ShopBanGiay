<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeed::class);
        $this->call(CategoryTableSeed::class);
        $this->call(ProductTableSeed::class);
        $this->call(ReviewTableSeed::class);
        $this->call(WishlistTableSeed::class);
        $this->call(OrderTableSeed::class);
        $this->call(CheckoutTableSeed::class);
        $this->call(BannerTableSeed::class);
        $this->call(DealTableSeed::class);
        $this->call(chillimageTableSeed::class);
    }
}
