@extends('master')
@section('master.title')
    Library | Category List
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Category</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="col-md-4">
                                @if(auth()->user()->role !== \App\Http\Role::ADMIN)
                                    <a class="btn btn-success " href="#" hidden>
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Create
                                    </a>
                                @else
                                    <a class="btn btn-success " href="{{route('category.create')}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Create
                                    </a>
                                @endif
                            </div>
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Date Created</th>
                                        @if(auth()->user()->role === \App\Http\Role::ADMIN)
                                            <th style="width: 20%">
                                            </th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key => $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td><img src="{{asset('storage/'. $category->image)}}" alt="" width="80" height="75"></td>
                                        <td>{{$category->title}}</td>
                                        <td>{{$category->created_at}}</td>
                                        @if(auth()->user()->role === \App\Http\Role::ADMIN)
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="">
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
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
