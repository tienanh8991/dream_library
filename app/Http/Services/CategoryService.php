<?php


namespace App\Http\Services;

use App\Category;
use App\Http\Repositories\CategoryRepository;
use Brian2694\Toastr\Facades\Toastr;

class CategoryService
{
    protected $categoryRepo;
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAll() {
       return $this->categoryRepo->getAll();
    }

    public function find($id) {
        return $this->categoryRepo->find($id);
    }

    public function create($request) {
        $category = new Category();
        $category->title = $request->title;
        $category->image = $request->image->store('images','public');
        $this->categoryRepo->save($category);

    }

    public function update($request , $id) {
        $category = $this->find($id);
        $category->title = $request->title;
        $category->image = $request->image->store('images','public');

        $this->categoryRepo->save($category);

    }
}
