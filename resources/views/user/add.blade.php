@extends('master')
@section('master.title')
    Library | Add new user
@endsection

@section('master.content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Add New User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User / Create</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
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
                                    <div style="color: red">
                                        @if($errors->has('name'))
                                            {{$errors->first('name')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" id="inputEmail" class="form-control" name="email">
                                    <div style="color: red">
                                        @if($errors->has('email'))
                                            {{$errors->first('email')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" id="inputPassword" class="form-control" name="password">
                                    <div style="color: red">
                                        @if($errors->has('password'))
                                            {{$errors->first('password')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputConfirmPassword">Confirm Password</label>
                                    <input type="password" id="inputConfirmPassword" class="form-control"
                                           name="confirmPassword">
                                    <div style="color: red">
                                        @if($errors->has('confirmPassword'))
                                            {{$errors->first('confirmPassword')}}
                                        @endif
                                    </div>
                                </div>
                                @if (session('Error'))
                                    <div class="alert alert-danger">{{session('Error')}}</div>
                                @endif

                                <div class="form-group">
                                    <label for="inputStatus">Library</label>
                                    <select class="form-control custom-select" name="category_id">
                                        @foreach($libraries as $key => $library)
                                            <option value="{{ $library->id }}" selected>{{$library->name}}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: red">
                                        @if($errors->has('library_id'))
                                            {{$errors->first('library_id')}}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">Phone</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="phone">
                                    <div style="color: red">
                                        @if($errors->has('phone'))
                                            {{$errors->first('phone')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Address</label>
                                    <input type="text" id="inputProjectLeader" class="form-control" name="address">
                                    <div style="color: red">
                                        @if($errors->has('address'))
                                            {{$errors->first('address')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputProjectLeader">Avatar</label>
                                    <input type="file" id="inputProjectLeader" class="form-control" name="avatar">
                                    <div style="color: red">
                                        @if($errors->has('avatar'))
                                            {{$errors->first('avatar')}}
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <a href="{{route('user.list')}}" class="btn btn-secondary">Cancel</a>
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
