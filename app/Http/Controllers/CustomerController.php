<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function getAll() {
        $customers = Customer::all();
        return view('list.customer',compact('customers'));
    }
    public function create() {
        return view('customer.add');
    }

    public function store(Request $request) {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->code_id = $request->code_id;
        $customer->class = $request->class;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $customer->status = BorrowStatus::NOT_BORROWED;

        $customer->save();
        return redirect()->route('user.list');
    }
}
