<?php


namespace App\Http\Services;


use App\Book;
use App\Http\Repositories\BookRepository;
use Brian2694\Toastr\Facades\Toastr;

class BookService
{
    protected $bookRepo;
    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function getAll() {
        return $this->bookRepo->getAll();
    }

    public function find($id) {
        return $this->bookRepo->find($id);
    }

    public function create($request) {
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->status = $request->status;
        $book->description = $request->desc;
        $book->avatar = $request->avatar->store('images','public');

        $this->bookRepo->save($book);
        Toastr::success('Add new complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }

    public function update($request , $id) {
        $book = $this->bookRepo->find($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->status = $request->status;
        $book->description = $request->desc;
        $book->avatar = $request->avatar->store('images','public');

        $this->bookRepo->save($book);
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }
}
