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
    }

    public function edit($id) {
        $category = $this->categoryService->find($id);

        return view('category.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id) {
        $this->categoryService->update($request, $id);

    }
}
