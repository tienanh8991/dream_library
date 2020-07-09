<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Http\Role;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAll() {
        return $this->userRepo->getAll();
    }

    public function find($id) {
        return $this->userRepo->find($id);
    }

    public function create($request) {
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
            $this->userRepo->save($user);
            return redirect()->route('user.list');
        }else{
            $request->session()->flash('Error','Password does not match !');
            return redirect()->route('user.create');
        }
    }

    public function update($request , $id) {
        $user = $this->userRepo->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->avatar = $request->avatar->store('images','public');

        $this->userRepo->save($user);
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.list');
    }
}
