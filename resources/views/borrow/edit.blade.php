@extends('master')
@section('master.title')
    Library | Add new Borrow
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Borrow Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Borrow Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{route('borrow.store')}}" method="post">
            @csrf
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Customer</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Customer</label>
                                    <select class="form-control custom-select" name="customer" disabled>
                                        <option selected >{{$borrow->customer->name}}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Book</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Book</label>
                                    <select class="form-control custom-select" name="book">
                                        <option selected disabled>Select one</option>
{{--                                        @foreach($borrows as $borrow)--}}
{{--                                            <option value="{{$borrow->books->name}}">{{$borrow->books->name}}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">In Library</label>
                                    <select class="form-control custom-select" name="library">
                                        <option selected disabled>Select one</option>
                                        <option>Library A</option>
                                        <option>Library B</option>
                                        <option>Library C</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{route('borrow.list')}}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">


                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Borrow</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Coupon Name</label>
                                    <input type="text" id="inputName" class="form-control" name="coupon_name">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Expected Date </label>
                                    <input type="date" id="inputName" class="form-control" name="expected_date">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </section>
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
