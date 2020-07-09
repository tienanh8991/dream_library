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
        $library->id = 0;
        $library->name = 'Library Default';
        $library->phone = '';
        $library->address = '';
        $library->save();

    }
}
