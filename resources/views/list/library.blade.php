@extends('master')
@section('master.title')
    Library | List User + Customer
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
                            <li class="breadcrumb-item active">Library / List</li>
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
                    <h3 class="card-title">Users</h3>
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

                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Name
                            </th>
                            <th style="width: 20%">
                                Avatar
                            </th>
                            <th style="width: 20%">
                                Phone
                            </th>
                            <th style="width: 20%">
                                Address
                            </th>
                            <th style="width: 10%">

                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($libraries as $key => $library)
                                <tr>
                                    <td> {{$key+=1}} </td>
                                    <td>
                                        <a>
                                            {{$library->name}}
                                        </a>
                                        <br/>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="{{asset('storage/'. $library->avatar)}}">
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <a>
                                            {{$library->phone}}
                                        </a>
                                        <br/>
                                    </td>
                                    <td class="project_progress">
                                        <a>
                                            {{$library->address}}
                                        </a>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{route('library.edit',$library->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                           href="{{route('library.delete',$library->id)}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
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
