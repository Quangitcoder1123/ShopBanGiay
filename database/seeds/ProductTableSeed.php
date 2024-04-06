<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Product::create(
                [
                    'cate_id' => 2,
                    'pro_name' => 'San pham '.$i,
                    'pro_image' => 'product.jpg',
                    'pro_desc' => 'Mo ta san pham',
                    'view' => 100,
                    'quantity' => 1000,
                    'pro_old_price' => 500000,
                    'pro_new_price' => 420000,
                    'pro_sale' => 1,
                ]
            );
        }
    }
}
