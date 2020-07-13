@extends('master')
@section('master.title')
    Library | Add new customer
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Add New Customer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Customer / Create</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->

            <form action="{{route('customer.store')}}" method="post" >
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
                                        <label for="inputEmail">Code ID</label>
                                        <input type="text" id="inputEmail" class="form-control" name="code_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Class</label>
                                        <input type="text" id="inputPassword" class="form-control" name="class">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Address</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Day Of Birth</label>
                                        <input type="date" id="inputProjectLeader" class="form-control" name="birthday">
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <a href="{{route('customer.list')}}" class="btn btn-secondary">Cancel</a>
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
