<?php


namespace App\Http\Repositories;


use App\Book;

class BookRepository
{
    protected $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAll() {
        return $this->book->all();
    }

    public function find($id) {
        return $this->book->findOrFail($id);
    }

    public function save($book) {
        $book->save();
    }
}
