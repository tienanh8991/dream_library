@extends('master')
@section('master.title')
    Library | Add new category
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Add New Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <div class="container ">
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
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
                                        <label for="inputName">Title</label>
                                        <input type="text" id="inputName" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Image</label>
                                        <input type="file" id="inputEmail" class="form-control" name="image">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('category.list')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </section>
            </form>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

