<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->id = 1;
        $user->name = 'tien anh';
        $user->email = 'tienanh12108991@gmail.com';
        $user->password = Hash::make('123456');
        $user->phone = '0125963254';
        $user->address = 'hai duong';
        $user->role = 1;
        $user->library_id = 1;
        $user->save();

        $user = new User();
        $user->id = 2;
        $user->name = 'librarian';
        $user->email = 'librarian@gmail.com';
        $user->password = Hash::make('123456');
        $user->phone = '0236547895';
        $user->address = 'bac ninh';
        $user->role = 2;
        $user->library_id = 2;
        $user->save();
    }
}
