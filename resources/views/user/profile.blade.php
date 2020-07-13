@extends('master')
@section('master.title')
    Library | Add new user
@endsection

@section('master.content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if($user->avatar === null)
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{asset('img/admin_img.jpg')}}"
                                             alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{asset('storage/'. $user->avatar)}}"
                                             alt="User profile picture">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{$user->name}}</h3>

                                @if(auth()->user()->role == \App\Http\Role::ADMIN)
                                    <p class="text-muted text-center">Boss</p>
                                @else
                                    <p class="text-muted text-center">Employee</p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">

                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted"></p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger"></span>
                                    <span class="tag tag-success"></span>
                                    <span class="tag tag-info"></span>
                                    <span class="tag tag-warning"></span>
                                    <span class="tag tag-primary"></span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted"></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                                            data-toggle="tab">Information</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                                            data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th scope="row" style="width: 50%">Name</th>
                                                <td style="width: 50%">{{$user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 50%">Email</th>
                                                <td style="width: 50%">{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 50%">Phone</th>
                                                <td style="width: 50%">{{$user->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="width: 50%">Address</th>
                                                <td style="width: 50%">{{$user->address}}</td>
                                            </tr>
                                            @if(auth()->user()->role !== \App\Http\Role::ADMIN)
                                                <tr disabled="disable">
                                                    <th scope="row" style="width: 50%">Library</th>
                                                    <td style="width: 50%">{{$user->library->name}}</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="tab-pane" id="settings">
                                        {{--                                        <form class="form-horizontal" method="post"--}}
                                        {{--                                              action="{{route('update.profile')}}">--}}
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" name="name"
                                                       value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                       name="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword"
                                                       name="password" disabled value="{{$user->password}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPhone"
                                                       name="phone" value="{{$user->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputAddress"
                                                       name="address" value="{{$user->address}}">
                                            </div>
                                        </div>
                                        @if(auth()->user()->role !== \App\Http\Role::ADMIN)
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">Library</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control custom-select" name="category_id">
                                                        @foreach($libraries as $key => $library)
                                                            <option value="{{ $library->id }}" id="inputLibrary">
                                                                {{$library->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">avatar</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="inputAvatar"
                                                       name="avatar" value="{{$user->avatar}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger btn-profile">Submit</button>
                                            </div>
                                        </div>
                                        {{--                                        </form>--}}
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
