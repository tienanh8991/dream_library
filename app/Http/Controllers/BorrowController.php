<?php

namespace App\Http\Controllers;

use App\Book;
use App\Borrow;
use App\Customer;
use App\Library;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function getAll() {
        $borrows = Borrow::all();
        return view('list.borrow',compact('borrows'));
    }

    public function create() {
        $customers = Customer::all();
        $books = Book::all();
        $libraries = Library::all();
        return view('borrow.add',compact('customers','books','libraries'));
    }

    public function store(Request $request) {
        $borrow = new Borrow();
        $borrow->customer_id = $request->customer;
        $borrow->book_name = $request->book;
        $borrow->coupon_name = $request->coupon_name;
        $borrow->expected_date = $request->expected_date;

        $borrow->save();
        return redirect()->route('borrow.list');
    }

    public function edit($id) {
        $borrow = Borrow::findOrFail($id);
        dd($borrow);
        return view('borrow.edit',compact('borrow'));
    }

    public function update(Request $request , $id) {
        $borrow = Borrow::findOrFail($id);

    }
}
