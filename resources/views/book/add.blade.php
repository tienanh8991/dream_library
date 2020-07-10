@extends('master')
@section('master.title')
    Library | Add new Book
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Add New Book</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Book / Create</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->

            <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Information</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" id="inputName" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Author</label>
                                        <input type="text" id="inputName" class="form-control" name="author">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Book Category</label>
                                        <select class="form-control custom-select" name="category_id">
                                            @foreach($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select class="form-control custom-select" name="status">
                                            <option value="{{ \App\Http\Status::NEW }}" selected>New</option>
                                            <option value="{{ \App\Http\Status::OLD }}">Old</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Description</label>
                                        <textarea id="inputName" class="form-control" name="desc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Avatar</label>
                                        <input type="file" id="inputEmail" class="form-control" name="avatar">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{route('book.list')}}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </section>
            </form>
        </div>
        <!-- /.content -->

    <!-- /.content-wrapper -->

@endsection


