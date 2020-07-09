<?php

namespace App\Http\Controllers;

use App\Book;
use App\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function getAll() {
        $libraries = Library::all();
        return view('list.library',compact('libraries'));
    }

    public function create() {
        return view('library.add');
    }

    public function store(Request $request) {
        $library = new Library();
        $library->name = $request->name;
        $library->phone = $request->phone;
        $library->address = $request->address;
        $library->avatar = $request->avatar->store('images','public');

        $library->save();
        return redirect()->route('library.list');
    }

    public function edit($id) {
        $library = Library::findOrFail($id);
        return view('library.edit',compact('library'));
    }

    public function update(Request $request , $id) {
        $library = Library::findOrFail($id);
        $library->name = $request->name;
        $library->phone = $request->phone;
        $library->address = $request->address;
        $library->avatar = $request->avatar->store('images','public');

        $library->save();

        return redirect()->route('library.list');
    }

    public function destroy($id) {
        $library = Library::findOrFail($id);
        $books = $library->books;
        foreach ($books as $book) {
            $book->library_id = null;
            $book->save();
        }
        $users = $library->users;
        foreach ($users as $user) {
            $user->library_id = null;
            $user->save();
        }

        $library->delete();
        return redirect()->route('library.list');
    }
}
