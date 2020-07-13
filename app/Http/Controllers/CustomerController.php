<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Http\Services\CustomerService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function getAll() {
        $customers = Customer::all();
        return view('list.customer',compact('customers'));
    }
    public function create() {
        return view('customer.add');
    }

    public function store(CustomerRequest $request) {
        $this->customerService->create($request);
        Toastr::success('Create complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('user.list');
    }

    public function search(Request $request) {
        $customers = Customer::where('name', 'LIKE', '%' . $request->keyword . '%')->get();
        return response()->json($customers);
    }

    public function render(Request $request) {
        $customer = Customer::findOrFail($request->keyword);
        return response()->json($customer);
    }

    public function edit($id) {
        $customer = Customer::findOrFail($id);
        return view('customer.edit',compact('customer'));

    }

    public function update(CustomerRequest $request, $id) {
        $this->customerService->update($request, $id);
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('customer.list');
    }

    public function destroy($id) {
        $customer = $this->customerService->find($id);
        $customer->delete();

        Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('customer.list');
    }
}
