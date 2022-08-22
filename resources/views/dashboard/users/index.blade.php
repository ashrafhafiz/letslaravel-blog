@extends('dashboard.layout.layout')

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
                    <a class="btn btn-secondary" href="{{ route('dashboard.index') }}"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                    <a class="btn btn-secondary" href="{{ route('dashboard.users.index') }}"><i class="icon-settings"></i> &nbsp;Users</a>
                </div>
            </li>
        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">

            </div>

        </div>
        <!--/.container-fluid-->
    </main>

@endsection
