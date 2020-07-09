@extends('master')
@section('master.title')
    Library | List Books
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Books</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <a class="btn btn-success " href="{{route('book.create')}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Create
                    </a>
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%" class="text-center">
                                Name
                            </th>
                            <th style="width: 10%" class="text-center">
                                Avatar
                            </th>
                            <th style="width: 10%" class="text-center">
                                Author
                            </th>
                            <th style="width: 10%" class="text-center">
                                Book Category
                            </th>
                            <th style="width: 8%" class="text-center">
                                Library
                            </th>
                            <th style="width: 20%" class="text-center">
                                Borrowed
                            </th>
                            <th>
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $key => $book)
                            <tr>
                                <td> {{$key+=1}} </td>
                                <td class="text-center">
                                    <a>
                                        {{$book->name}}
                                    </a>
                                    <br/>
                                </td>
                                <td class="text-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" height="75" width="75"
                                                 src="{{asset('storage/'.$book->avatar)}}">
                                        </li>
                                    </ul>
                                </td>
                                <td class="text-center">
                                    <a>
                                        {{$book->author}}
                                    </a>
                                    <br/>
                                </td>
                                <td class="project_progress text-center">
                                    @if($book->category_id !== \App\Http\Controllers\BookDefault::DEFAULT)
                                        <a>
                                            {{$book->category->title}}
                                        </a>
                                    @else
                                        <span class="badge badge-danger">Category Default</span>
                                    @endif
                                </td>
                                <td class="project_progress text-center">
                                    @if($book->library_id !== \App\Http\Controllers\BookDefault::DEFAULT)
                                        <a>
                                            {{$book->library->name}}
                                        </a>
                                    @else
                                        <span class="badge badge-danger">Library Default</span>
                                    @endif
                                </td>
                                <td class="project-state">
                                    @if($book->borrowed === \App\Http\Controllers\BorrowStatus::BORROWED)
                                        <span class="badge badge-success">Borrowed</span>
                                    @else
                                        <span class="badge badge-danger">Not Borrowed</span>
                                    @endif
                                </td>
                                @if($book->borrowed !== \App\Http\Controllers\BorrowStatus::BORROWED)
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{route('book.edit',$book->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{route('book.delete',$book->id)}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
