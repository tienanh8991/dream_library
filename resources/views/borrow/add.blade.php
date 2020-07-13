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
                            <li class="breadcrumb-item active">Borrow / create</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
{{--        <form action="{{route('borrow.store')}}" method="post">--}}
{{--            @csrf--}}
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
                                    <label>Choose Customer</label>
                                    <input type="text" id="choose-customer" class="form-control">
                                    <ul class="list-group" id="list-customer-search" style="position: absolute; width: 95%"></ul>
                                </div>
                                <div class="customer-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Class</th>
                                            </tr>
                                            </thead>
                                            <tbody id="customer-table-choose">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <hr>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Borrow Expected</label>
                                    <input type="date" id="borrow-expected" class="form-control"
                                           value="<?php echo date("Y-m-d");?>">
                                    <span id="error-date" style="color: red"></span>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success borrow-btn">Submit</button>
                                <a href="{{route('borrow.list')}}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
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
                                    <label>Choose Books</label>
                                    <input type="text" id="choose-book" class="form-control">
                                    <ul class="list-group" id="list-book-search"></ul>
                                </div>
                                <div class="book-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Author</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="book-table-choose">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </section>
{{--        </form>--}}
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
