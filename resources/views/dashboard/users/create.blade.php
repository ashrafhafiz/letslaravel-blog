@extends('dashboard.layouts.layout')

@section('main')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">Users</a></li>

            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                    <a class="btn btn-secondary" href="{{ route('dashboard.index') }}"><i class="icon-graph"></i>
                        &nbsp;Dashboard</a>
                    <a class="btn btn-secondary" href="{{ route('dashboard.users.index') }}"><i class="icon-settings"></i>
                        &nbsp;Users</a>
                </div>
            </li>
        </ol>

        <div class="container-fluid">
            <div class="animated fadeIn">

                <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="card">
                            <div class="card-header">
                                <strong class="font-2xl">Create New User Account</strong> Form
                            </div>
                            <div class="card-block">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="facebook">{{ __('dict.user_name') }}</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                               placeholder="Enter user name...">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">{{ __('dict.email') }}</label>
                                        <input type="email" name="email" class="form-control" value=""
                                               placeholder="Enter valid email...">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="status">{{ __('dict.status') }}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select Status...</option>
                                            {{--                                        <option value="">Inactive</option>--}}
                                            <option value="admin">Admin</option>
                                            <option value="editor">Editor</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">{{ __('dict.password') }}</label>
                                        <input type="password" name="password" class="form-control" value=""
                                               placeholder="Enter valid password...">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!--/row-->

                    <div class="row">
                        <div class="card">
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <a class="btn btn-danger" href="{{url()->previous()}}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
                <!--/.row-->

            </div>
        </div>
        <!--/.container-fluid-->
    </main>
@endsection
