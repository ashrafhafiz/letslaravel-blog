@extends('dashboard.layouts.layout')

@section('main')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">{{ __('dict.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('dict.dashboard') }}</a></li>
            <li class="breadcrumb-item active"><strong>{{ __('dict.posts') }}</strong></li>

            <!-- Breadcrumb Menu-->
            {{-- <li class="breadcrumb-menu"> --}}
            {{-- <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> --}}
            {{-- <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a> --}}
            {{-- <a class="btn btn-secondary" href="{{ route('dashboard.index') }}"><i class="icon-graph"></i> --}}
            {{-- &nbsp;Dashboard</a> --}}
            {{-- <a class="btn btn-secondary" href="{{ route('dashboard.posts.index') }}"><i class="icon-settings"></i> --}}
            {{-- &nbsp;posts</a> --}}
            {{-- </div> --}}
            {{-- </li> --}}
        </ol>

        <div class="container-fluid">
            <div class="animated fadeIn">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="d-inline-block">{{ __('dict.posts_list') }}</h3>
                            <div class="d-inline-block pull-left">
                                <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary"
                                    style="margin-top: 0;">{{ __('dict.create_new_post') }}</a>
                            </div>
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th class="pull-right">{{ __('dict.id') }}</th>
                                        <th>{{ __('dict.post_title') }}</th>
                                        <th>{{ __('dict.description') }}</th>
                                        <th>{{ __('dict.actions') }}</th>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ __('dict.delete_post') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.posts.destroy', 'test') }}" method="post">
                        {{ method_field('Delete') }}
                        @csrf
                        {{ __('dict.warning_post') }}
                        <input id="id" type="hidden" name="id" class="form-control" value="">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('dict.close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('dict.submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.posts.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'shortDesc',
                        name: 'shortDesc'
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

        $('#data-table tbody').on('click', '#deleteBtn', function() {
            var id = $(this).attr('data-id');
            $('#deleteModal #id').val(id)
        });
    </script>
@endpush
