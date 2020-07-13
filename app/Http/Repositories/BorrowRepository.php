<?php


namespace App\Http\Repositories;


use App\Borrow;

class BorrowRepository
{
    protected $borrow;
    public function __construct(Borrow $borrow)
    {
        $this->borrow = $borrow;
    }

    public function getBorrow($id) {
        return $this->borrow = Borrow::where('status', $id)->get();
    }

    public function find($id) {
        return $this->borrow = Borrow::findOrFail($id);
    }

    public function save($borrows) {
        $borrows->save();
    }
}
