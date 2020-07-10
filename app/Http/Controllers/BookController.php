<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use App\Http\Role;
use App\Http\Services\BookService;
use App\Http\Services\CategoryService;
use App\Library;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    protected $bookService;
    protected $categoryService;
    public function __construct(BookService $bookService, CategoryService $categoryService)
    {
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
    }

    public function getAll() {
        if (Auth::user()->role == Role::ADMIN){
            $books = $this->bookService->getAll();
        }else{
            $library_id = Auth::user()->library_id;
            $books = Book::where('library_id',$library_id)->get();
        }
        return view('list.book',compact('books'));
    }

    public function create() {
        $libraries = Library::all();
        $categories = $this->categoryService->getAll();
        return view('book.add',compact('categories','libraries'));
    }

    public function store(BookRequest $request) {
        $this->bookService->create($request);
        Toastr::success('Add new complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('book.list');
    }

    public function edit($id) {
        $categories = $this->categoryService->getAll();
        $book = $this->bookService->find($id);

        return view('book.edit',compact('book','categories'));
    }

    public function update(Request $request , $id) {
        $this->bookService->update($request,$id);
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }

    public function destroy($id) {
        $book = $this->bookService->find($id);
        $book->delete();

        Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }
}
