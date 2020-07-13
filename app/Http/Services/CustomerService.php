<?php


namespace App\Http\Services;


use App\Customer;
use App\Http\Controllers\BorrowStatus;
use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepo;
    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }

    public function getAll() {
        return $this->customerRepo->getAll();
    }

    public function find($id) {
        return $this->customerRepo->find($id);
    }

    public function create($request) {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->code_id = $request->code_id;
        $customer->class = $request->class;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $customer->status = BorrowStatus::NOT_BORROWED;

        $this->customerRepo->save($customer);
    }

    public function update($request , $id) {
        $customer = $this->find($id);
        $customer->name = $request->name;
        $customer->class = $request->class;
        $customer->code_id = $request->code_id;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;

        $this->customerRepo->save($customer);
    }
}
