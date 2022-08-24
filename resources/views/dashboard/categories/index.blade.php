@extends('dashboard.layouts.layout')

@section('main')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>

            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                    <a class="btn btn-secondary" href="{{ route('dashboard.index') }}"><i class="icon-graph"></i>
                        &nbsp;Dashboard</a>
                    <a class="btn btn-secondary" href="{{ route('dashboard.categories.index') }}"><i class="icon-settings"></i>
                        &nbsp;Categories</a>
                </div>
            </li>
        </ol>

        <div class="container-fluid">
            <div class="animated fadeIn">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="d-inline-block">Categories Table</h3>
                            <div class="d-inline-block pull-left">
                                <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary"
                                   style="margin-top: 0;">Create New Category</a>
                            </div>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered table-striped" id="data-table">
                                <thead>
                                <tr>
                                    <th class="pull-right">id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Parent</th>
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



    <!-- delete_modal_grade -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                        id="exampleModalLabel">
                        {{ __('dict.delete_category') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.categories.destroy', 'test') }}" method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        {{ __('dict.warning_category') }}
                        <input id="id" type="hidden" name="id" class="form-control"
                               value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('dict.close') }}</button>
                            <button type="submit"
                                    class="btn btn-danger">{{ __('dict.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{--    modal    --}}
    {{--    <div id="deleteModal" class="modal" tabindex="-1" role="dialog">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h5 class="modal-title">Delete User</h5>--}}
    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">&times;</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    <p>Are you sure you want to delete the category?</p>--}}
    {{--                </div>--}}
    {{--                <div class="modal-footer">--}}
    {{--                    <button type="button" class="btn btn-primary">Delete</button>--}}
    {{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection

@push('javascripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.categories.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                    {
                        data: 'parent',
                        name: 'parent',
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

        $('#data-table tbody').on('click', '#deleteBtn', function (){
            var id = $(this).attr('data-id');
            $('#deleteModal #id').val(id)
        });
    </script>
@endpush
