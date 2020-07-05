<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Http\Requests\BookRequest;
use Brian2694\Toastr\Facades\Toastr;

class BookController extends Controller
{
    public function getAll() {
        $books = Book::all();
        return view('list.book',compact('books'));
    }

    public function create() {
        $categories = Category::all();
        return view('book.add',compact('categories'));
    }

    public function store(BookRequest $request) {
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->status = $request->status;
        $book->description = $request->desc;
        $book->avatar = $request->avatar->store('images','public');

        $book->save();
        Toastr::success('Add new complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }

    public function edit($id) {
        $categories = Category::all();
        $book = Book::findOrFail($id);
        return view('book.edit',compact('book','categories'));
    }

    public function update(BookRequest $request , $id) {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->status = $request->status;
        $book->description = $request->desc;
        $book->avatar = $request->avatar->store('images','public');

        $book->save();
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();

        Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }
}
