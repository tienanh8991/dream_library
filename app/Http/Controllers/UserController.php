<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\UserRequest;
use App\Http\Role;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function getAll() {
        $customers = Customer::all();
        $users = User::all();
        return view('list.user+customer_list',compact('users','customers'));
    }

    public function create() {
        return view('user.add');
    }

    public function store(UserRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = Role::LIBRARIAN;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->avatar = $request->avatar->store('images','public');

        if ($request->password === $request->confirmPassword){
            Toastr::success('Add new complete !', 'Success', ["positionClass" => "toast-top-right"]);
            $user->save();
            return redirect()->route('user.list');
        }else{
            $request->session()->flash('Error','Password does not match !');
            return redirect()->route('user.create');
        }
    }

    public function editUser($id) {
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request , $id) {

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->avatar = $request->avatar->store('images','public');

        $user->save();
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.list');

    }

    public function destroy($id) {
        if (auth()->user()->role === Role::ADMIN){
            $user = User::findOrFail($id);
            $user->role = Role::HIDE;
            $user->save();
            Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('user.list');
        }else{
            return back();
        }

    }

    public function restoreUser($id) {
        $user = User::findOrFail($id);
        $user->role = Role::LIBRARIAN;
        $user->save();
        Toastr::success('Restore user complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('user.list');
    }
}
