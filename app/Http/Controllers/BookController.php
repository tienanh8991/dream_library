<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\BookRequest;
use App\Http\Services\BookService;
use App\Http\Services\CategoryService;
use Brian2694\Toastr\Facades\Toastr;

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
        $books = $this->bookService->getAll();
        return view('list.book',compact('books'));
    }

    public function create() {
        $categories = $this->categoryService->getAll();
        return view('book.add',compact('categories'));
    }

    public function store(BookRequest $request) {
        $this->bookService->create($request);
    }

    public function edit($id) {

        $categories = $this->categoryService->getAll();
        $book = $this->bookService->find($id);
        dd($book->borrows);
        return view('book.edit',compact('book','categories'));
    }

    public function update(BookRequest $request , $id) {
        $this->bookService->update($request,$id);
    }

    public function destroy($id) {
        $book = $this->bookService->find($id);
        $book->delete();

        Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('book.list');
    }
}
