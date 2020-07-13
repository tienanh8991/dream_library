<?php

use App\Book;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->name = 'Cuộc đời dài lắm';
        $book->author = 'Chu Lai';
        $book->category_id = 1;
        $book->library_id = 1;
        $book->status = 1;
        $book->borrowed = 2;
        $book->description = 'sdjkhassflj';
        $book->save();

        $book = new Book();
        $book->name = 'Hai đứa trẻ';
        $book->author = 'Thạch Lam';
        $book->category_id = 3;
        $book->library_id = 1;
        $book->status = 1;
        $book->borrowed = 2;
        $book->description = 'sdjkhassflj';
        $book->save();

        $book = new Book();
        $book->name = 'Truyện năm 1968';
        $book->author = 'Trầm Hương';
        $book->category_id = 2;
        $book->library_id = 2;
        $book->status = 1;
        $book->borrowed = 2;
        $book->description = 'sdjkhassflj';
        $book->save();

        $book = new Book();
        $book->name = 'Rừng Nauy';
        $book->author = 'Murakami Haruki';
        $book->category_id = 4;
        $book->library_id = 1;
        $book->status = 1;
        $book->borrowed = 2;
        $book->description = 'sdjkhassflj';
        $book->save();

        $book = new Book();
        $book->name = 'Tuổi thơ dữ dội';
        $book->author = 'Phùng Quán';
        $book->category_id = 5;
        $book->library_id = 2;
        $book->status = 1;
        $book->borrowed = 2;
        $book->description = 'sdjkhassflj';
        $book->save();
    }
}
