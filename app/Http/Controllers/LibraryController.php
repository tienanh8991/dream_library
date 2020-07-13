<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use App\Http\Services\LibraryService;
use Brian2694\Toastr\Facades\Toastr;

class LibraryController extends Controller
{
    protected $libraryService;

    public function __construct(LibraryService $libraryService)
    {
        $this->libraryService = $libraryService;
    }

    public function getAll()
    {
        $libraries = $this->libraryService->getAll();
        return view('list.library', compact('libraries'));
    }

    public function create()
    {
        return view('library.add');
    }

    public function store(LibraryRequest $request)
    {
        $this->libraryService->create($request);
        Toastr::success('Create complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('library.list');
    }

    public function edit($id)
    {
        $library = $this->libraryService->find($id);
        return view('library.edit', compact('library'));
    }

    public function update(LibraryRequest $request, $id)
    {
        $this->libraryService->update($request,$id);
        Toastr::success('Update complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('library.list');
    }

    public function destroy($id)
    {
        $this->libraryService->delete($id);
        Toastr::success('Delete complete !', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('library.list');
    }
}
