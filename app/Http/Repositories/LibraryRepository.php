<?php


namespace App\Http\Repositories;


use App\Library;

class LibraryRepository
{
    protected $library;
    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    public function getAll() {
        return $this->library->all();
    }

    public function find($id) {
        return $this->library->findOrFail($id);
    }

    public function save($library) {
        $library->save();
    }
}
