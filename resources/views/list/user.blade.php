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
                            <li class="breadcrumb-item active">List</li>
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
                    @if(auth()->user()->role !== \App\Http\Role::ADMIN)
                        <a class="btn btn-success " href="#" hidden>
                            <i class="fas fa-pencil-alt">
                            </i>
                            Create
                        </a>
                    @else
                        <a class="btn btn-success " href="{{route('user.create')}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Create
                        </a>
                    @endif
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Name
                            </th>
                            <th style="width: 10%">
                                Avatar
                            </th>
                            <th style="width: 20%">
                                Email
                            </th>
                            <th style="width: 15%">
                                Address
                            </th>
                            <th style="width: 13%" class="text-center">
                                Role
                            </th>
                            <th style="width: 10%">
                                Library
                            </th>
                            @if(auth()->user()->role === \App\Http\Role::ADMIN)
                                <th style="width: 20%">
                                </th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td> {{$key+=1}} </td>
                                <td>
                                    <a>
                                        {{$user->name}}
                                    </a>
                                    <br/>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a>
                                        {{$user->email}}
                                    </a>
                                    <br/>
                                </td>
                                <td class="project_progress">
                                    <a>
                                        {{$user->address}}
                                    </a>
                                </td>
                                <td class="project-state">
                                    @if($user->role === \App\Http\Role::ADMIN)
                                        <span class="badge badge-primary">Admin</span>
                                    @elseif($user->role === \App\Http\Role::LIBRARIAN)
                                        <span class="badge badge-success">Librarian</span>
                                    @else
                                        <span class="badge badge-secondary">Hide</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->role !== \App\Http\Role::ADMIN)
                                        @if($user->library_id !== \App\Http\Controllers\BookDefault::DEFAULT)
                                            <a>
                                                {{$user->library->name}}
                                            </a>
                                        @else
                                            <span class="badge badge-danger">Library Default</span>
                                        @endif
                                    @endif
                                    <br/>
                                </td>
                                @if(auth()->user()->role === \App\Http\Role::ADMIN)
                                    @if($user->role === \App\Http\Role::ADMIN)
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="{{route('user.edit',$user->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                        </td>
                                    @endif
                                    @if($user->role === \App\Http\Role::LIBRARIAN)
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="{{route('user.edit',$user->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="{{route('user.delete',$user->id)}}">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    @endif
                                    @if($user->role === \App\Http\Role::HIDE)
                                        <td class="project-actions text-right">
                                            <a class="btn btn-success btn-sm"
                                               href="{{route('user.restore',$user->id)}}">
                                                <i class="fas fa-reply">
                                                </i>
                                                Restore
                                            </a>
                                        </td>
                                    @endif
                                @endif
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
