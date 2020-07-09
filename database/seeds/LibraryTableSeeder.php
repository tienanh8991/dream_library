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
        $library->id = 1;
        $library->name = 'Library A';
        $library->phone = '0536254128';
        $library->address = '12 ngv';
        $library->save();

        $library = new Library();
        $library->id = 2;
        $library->name = 'Library B';
        $library->phone = '0133625485';
        $library->address = '23 Dov';
        $library->save();
    }
}
