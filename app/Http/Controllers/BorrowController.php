<?php

namespace App\Http\Controllers;

use App\Http\Services\BorrowService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    protected $borrowService;
    public function __construct(BorrowService $borrowService)
    {
        $this->borrowService = $borrowService;
    }

    public function getBorrow()
    {
        $borrows = $this->borrowService->getByStatus(2);
        return view('list.borrow', compact('borrows'));
    }

    public function showReturnBorrows()
    {
        $borrows = $this->borrowService->getByStatus(1);
        return view('list.borrowsReturn',compact('borrows'));
    }

    public function create()
    {
        return view('borrow.add');
    }

    public function store(Request $request)
    {
        $this->borrowService->create($request);

        return response()->json($request->all());
    }

    public function returnBook($id)
    {
        $this->borrowService->returnBook($id);

        Toastr::success('Return Book complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('borrow.list');
    }

}
