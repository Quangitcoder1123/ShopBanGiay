<?php

use Illuminate\Database\Seeder;
use App\Banner;

class BannerTableSeed extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <6; $i++){
            Banner::create([
                'ban_name' => 'banner'.$i,
                'ban_image' => 'banner.png',
            ]);
        }
    }
}
