<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Category::create([
                'cate_name' => 'Danh muc me ' . $i,
                'cate_desc' => 'mo ta danh muc ' . $i,
                'cate_logo' => 'cate_logo.png',
                'cate_image' => 'cate_image.png',
            ]);
            for ($y = 0; $y < 3; $y++){
                Category::create([
                    'cate_name' => 'Danh muc con ' . $y,
                    'cate_desc' => 'mo ta danh muc ',
                    'cate_logo' => 'cate_logo.png',
                    'cate_image' => 'cate_image.png',
                    'parent_id' => $i,
                ]);
            }
        }
    }
}
