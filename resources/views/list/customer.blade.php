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
                            <li class="breadcrumb-item active">Customer / List</li>
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
                    <h3 class="card-title">Customers</h3>
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
                                Code ID
                            </th>
                            <th style="width: 20%">
                                Class
                            </th>
                            <th style="width: 20%">
                                Date Of Births
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $customer)
                            <tr>
                                <td>
                                    {{$customer->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$customer->name}}
                                    </a>
                                    <br/>
                                </td>
                                <td>
                                    <a>
                                        {{$customer->code_id}}
                                    </a>
                                </td>
                                <td class="project_progress">
                                    <a>
                                        {{$customer->class}}
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        {{$customer->birthday}}
                                    </a>
                                </td>
                                <td class="project-state">
                                    @if($customer->status == \App\Http\Controllers\BorrowStatus::BORROWED)
                                        <span class="badge badge-success">Borrowed</span>
                                    @else
                                        <span class="badge badge-danger">Not Borrowed</span>
                                    @endif
                                </td>

                                <td class="project-actions text-right" >
                                    <a class="btn btn-info btn-sm" href="{{route('customer.edit',$customer->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    @if($customer->status !== \App\Http\Controllers\BorrowStatus::BORROWED)
                                    <a class="btn btn-danger btn-sm" href="{{route('customer.delete',$customer->id)}}" disabled="disable">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                    @endif
                                </td>

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
