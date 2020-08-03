<?php


namespace App\Http\Services;


use App\Book;
use App\Borrow;
use App\Customer;
use App\Http\Repositories\BorrowRepository;

class BorrowService
{
    protected $borrowRepo;
    protected $customerService;
    protected $bookService;
    public function __construct(BorrowRepository $borrowRepo, CustomerService $customerService , BookService $bookService)
    {
        $this->borrowRepo = $borrowRepo;
        $this->customerService = $customerService;
        $this->bookService = $bookService;
    }

    public function getByStatus($status) {
       return $this->borrowRepo->getBorrow($status);
    }

    public function find($id) {
       return $this->borrowRepo->find($id);
    }

    public function create($request) {
        $borrow = new Borrow();
        $borrow->customer_id = $request->idCustomer;
        $borrow->book_id = $request->idBook;
        $borrow->expected_date = $request->expected;
        $borrow->borrow_date = $request->borrow_date;
        $borrow->status = 2;

        $borrow->save();

        $customer = $this->customerService->find($borrow->customer_id);
        $customer->status = 1;
        $customer->save();

        $book = $this->bookService->find($borrow->book_id);
        $book->borrowed = 1;
        $book->save();
    }

    public function returnBook($id) {
        $borrow = $this->find($id);

        $customer_id = $borrow->customer_id;
        $book_id = $borrow->book_id;

        $borrow->status = 1;
        $borrow->save();

        $customer = $this->customerService->find($customer_id);
        $customer->status = 2;
        $customer->save();

        $book = $this->bookService->find($book_id);
        $book->borrowed = 2;
        $book->save();
    }
}
