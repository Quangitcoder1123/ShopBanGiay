<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <=20; $i++){
            Order::create([
                'user_id' => $i,
                'order_name' => 'Khach Dat Hang',
                'order_phone' => '0337792097',
                'order_city' => 'Da Nang',
                'order_district' => 'Lien Chieu',
                'order_ward' => 'Hoa Minh',
                'order_address' => '137 Nguyen Thi Thap',
                'order_qty' => 4,
                'ship_method' => 1,
                'pay_method' => 1,
                'order_total' => 1000000,
                'order_status' => 1,
            ]);
        }
    }
}
