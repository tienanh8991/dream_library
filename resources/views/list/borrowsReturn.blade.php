@extends('master')
@section('master.title')
    Library | List Borrows Return
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
                            <li class="breadcrumb-item active">Borrow Return / List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <br>
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
                            <th style="width: 10%">
                                #
                            </th>
                            <th style="width: 15%">
                                Customer
                            </th>
                            <th style="width: 15% ">
                                Book
                            </th>
                            <th style="width: 15%">
                                Day Borrow
                            </th>
                            <th style="width: 15%" >
                                Day Borrow Expected
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($borrows as $key => $borrow)
                            <tr>
                                <td>
                                    {{$borrow->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$borrow->customer->name}}
                                    </a>
                                </td>
                                <td class="project_progress">
                                    <a>
                                        {{$borrow->book->name}}
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        {{$borrow->borrow_date}}
                                    </a>
                                </td>
                                <td>
                                    <a>
                                        {{$borrow->expected_date}}
                                    </a>
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
