<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function getAll() {
        $users = User::all();
        return view('list.user+customer_list',compact('users'));
    }
}
