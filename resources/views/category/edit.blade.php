@extends('master')
@section('master.title')
    Library | Edit category
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Edit Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category / Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->

            <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
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
                                        <input type="text" id="inputName" class="form-control" name="title" value="{{$category->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Image</label>
                                        <input type="file" id="inputEmail" class="form-control" name="image" value="{{$category->image}}">
                                    </div>
                                    <div style="color: red">
                                        @if($errors->has('image'))
                                            {{$errors->first('image')}}
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{route('category.list')}}" class="btn btn-secondary">Cancel</a>
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

