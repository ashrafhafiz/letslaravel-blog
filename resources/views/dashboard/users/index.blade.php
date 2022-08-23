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
                    <a class="btn btn-secondary" href="{{ route('dashboard.index') }}"><i class="icon-graph"></i>
                        &nbsp;Dashboard</a>
                    <a class="btn btn-secondary" href="{{ route('dashboard.users.index') }}"><i class="icon-settings"></i>
                        &nbsp;Users</a>
                </div>
            </li>
        </ol>

        <div class="container-fluid">
            <div class="animated fadeIn">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="d-inline-block">Users Table</h3>
                            <div class="d-inline-block pull-left">
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"
                                    style="margin-top: 0;">Create New
                                    User</a>
                            </div>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th class="pull-right">id</th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--/.container-fluid-->
    </main>
@endsection

@push('javascripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.users.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    },
                ]
            });

        });
    </script>
@endpush
