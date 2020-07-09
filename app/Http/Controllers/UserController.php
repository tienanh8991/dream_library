<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\UserRequest;
use App\Http\Role;
use App\Http\Services\UserService;
use App\Library;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index() {
        return view('dashboard');
    }

    public function getAll() {
        $customers = Customer::all();
        $users = $this->userService->getAll();
        return view('list.user+customer_list',compact('users','customers'));
    }

    public function create() {
        $libraries = Library::all();
        return view('user.add',compact('libraries'));
    }

    public function store(UserRequest $request) {
        $this->userService->create($request);
    }

    public function editUser($id) {
        $libraries = Library::all();
        $user = $this->userService->find($id);
        return view('user.edit',compact('user','libraries'));
    }

    public function update(Request $request , $id) {

        $this->userService->update($request,$id);

    }

    public function destroy($id) {
        if (auth()->user()->role === Role::ADMIN){
            $user = $this->userService->find($id);
            $user->role = Role::HIDE;
            $user->save();
            Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('user.list');
        }else{
            return back();
        }

    }

    public function restoreUser($id) {
        $user = $this->userService->find($id);
        $user->role = Role::LIBRARIAN;
        $user->save();
        Toastr::success('Restore user complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('user.list');
    }
}
