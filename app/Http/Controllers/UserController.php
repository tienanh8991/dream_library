<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Role;
use App\Http\Services\UserService;
use App\Library;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('dashboard');
    }

    public function getAll()
    {
        $users = $this->userService->getAll();
        return view('list.user', compact('users'));
    }

    public function getProfile()
    {
        $libraries = Library::all();
        $user = auth()->user();
        return view('user.profile',compact('user','libraries'));
    }

    public function create()
    {
        $libraries = Library::all();
        return view('user.add', compact('libraries'));
    }

    public function store(UserRequest $request)
    {
        $this->userService->create($request);
        Toastr::success('Create complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.create');
    }

    public function editUser($id)
    {
        $libraries = Library::all();
        $user = $this->userService->find($id);
        return view('user.edit', compact('user', 'libraries'));
    }

    public function update(Request $request, $id)
    {
        $this->userService->update($request, $id);
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.list');
    }

    public function destroy($id)
    {
        if (auth()->user()->role === Role::ADMIN) {
            $user = $this->userService->find($id);
            $user->role = Role::HIDE;
            $user->save();
            Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);

            return redirect()->route('user.list');
        } else {
            return back();
        }
    }

    public function restoreUser($id)
    {
        $user = $this->userService->find($id);
        $user->role = Role::LIBRARIAN;
        $user->save();
        Toastr::success('Restore user complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('user.list');
    }

    public function editProfile(Request $request)
    {
        $user = $this->userService->find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
//        $user->avatar = $request->avatar->store('images','public');
        if (auth()->user()->role === Role::ADMIN ){
            $user->role = Role::ADMIN;
            $user->library_id = null;
        }elseif (auth()->user()->role === Role::LIBRARIAN){
            $user->role = Role::LIBRARIAN;
            $user->library_id = $request->library_id;
        }

        $user->save();

        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return response()->json($user);

    }
}
