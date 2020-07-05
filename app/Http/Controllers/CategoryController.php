<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function getAll() {
        $categories = Category::all();
        return view('list.category',compact('categories'));
    }

    public function create() {
        return view('category.add');
    }

    public function store(CategoryRequest $request) {
        $category = new Category();
        $category->title = $request->title;
        $category->image = $request->image->store('images','public');

        Toastr::success('Add new complete !', 'Success', ["positionClass" => "toast-top-right"]);
        $category->save();

        return redirect()->route('category.list');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id) {
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->image = $request->image->store('images','public');

        $category->save();
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        $category->save();
        return redirect()->route('category.list');
    }
}
