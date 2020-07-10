<?php


namespace App\Http\Services;

use App\Http\Repositories\LibraryRepository;
use App\Library;

class LibraryService
{
    protected $libraryRepo;
    public function __construct(LibraryRepository $libraryRepo)
    {
        $this->libraryRepo = $libraryRepo;
    }

    public function getAll() {
        return $this->libraryRepo->getAll();
    }

    public function find($id) {
        return $this->libraryRepo->find($id);
    }

    public function create($request) {
        $library = new Library();
        $library->name = $request->name;
        $library->phone = $request->phone;
        $library->address = $request->address;
        $library->avatar = $request->avatar->store('images','public');

        $library->save();
    }

    public function update($request , $id) {
        $library = $this->libraryRepo->find($id);
        $library->name = $request->name;
        $library->phone = $request->phone;
        $library->address = $request->address;
        if ($request->avatar !== null){
            $library->avatar = $request->avatar->store('images', 'public');
        }else{
            $library->avatar = $library->avatar->store('', 'public');
        }

        $library->save();
    }

    public function delete($id) {
        $library = $this->find($id);
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
    }
}
