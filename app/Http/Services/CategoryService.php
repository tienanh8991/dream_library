<?php


namespace App\Http\Services;

use App\Category;
use App\Http\Repositories\CategoryRepository;

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
        if ($request->image !== null){
            $category->image = $request->image->store('images','public');
        }else{
            $category->image = $request->image->store('','public');
        }

        $this->categoryRepo->save($category);

    }
}
