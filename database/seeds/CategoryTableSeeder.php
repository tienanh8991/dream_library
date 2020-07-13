<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->title = 'Văn Học';
        $category->save();

        $category = new Category();
        $category->title = 'Hồi Ký';
        $category->save();

        $category = new Category();
        $category->title = 'Truyện';
        $category->save();

        $category = new Category();
        $category->title = 'Tiểu thuyết';
        $category->save();

        $category = new Category();
        $category->title = 'NA';
        $category->save();
    }
}
