<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAll() {
        $categories = $this->categoryService->getAll();
        return view('list.category',compact('categories'));
    }

    public function create() {
        return view('category.add');
    }

    public function store(CategoryRequest $request) {
        $this->categoryService->create($request);

        Toastr::success('Add new complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('category.list');
    }

    public function edit($id) {
        $category = $this->categoryService->find($id);

        return view('category.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id) {
        $this->categoryService->update($request, $id);
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('category.list');
    }

    public function destroy($id) {
        $category = $this->categoryService->find($id);
        $books = $category->books;

        foreach ($books as $book) {
            $book->category_id = null;
            $book->save();
        }

        $category->delete();

        Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('category.list');
    }
}
