<?php

use Illuminate\Database\Seeder;
use App\proChillImage;

class chillimageTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++){
            proChillImage::create([
                'pro_id' => $i,
                'chill_image' => 'chill.jpg',
            ]);
            proChillImage::create([
                'pro_id' => $i,
                'chill_image' => 'chill.jpg',
            ]);
            proChillImage::create([
                'pro_id' => $i,
                'chill_image' => 'chill.jpg',
            ]);
            proChillImage::create([
                'pro_id' => $i,
                'chill_image' => 'chill.jpg',
            ]);
        }
    }
}
