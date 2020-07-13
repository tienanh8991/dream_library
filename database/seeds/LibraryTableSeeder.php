<?php

use App\Library;
use Illuminate\Database\Seeder;

class LibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $library = new Library();
        $library->name = 'Library A';
        $library->phone = '0111632556';
        $library->address = 'jkadjkahjdhjah';
        $library->save();

        $library = new Library();
        $library->name = 'Library b';
        $library->phone = '09963541452';
        $library->address = 'kfjlksdeubsbvvvsd';
        $library->save();

    }
}
