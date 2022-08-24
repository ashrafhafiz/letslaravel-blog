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

                <form action="{{ route('dashboard.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="card">
                            <div class="card-header">
                                <strong class="font-2xl">Create New Category</strong> Form
                            </div>
                            <div class="card-block">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="image">{{ __('dict.category_image') }}</label>
                                        <input type="file" name="image" class="form-control" placeholder="Select category image...">
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="parent_category_id">Parent Category</label>
                                        <select name="parent_category_id" id="parent_category_id" class="form-control">
                                            <option value="">Select Parent Category</option>
                                            @foreach($categories as $category)
                                                    <options value="">{{ $category->translate(app()->getLocale())->name }}</options>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="font-2xl">Translation</strong> Form
                                        </div>
                                        <div class="card-block">

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                @foreach(config('app.languages') as $key=>$language)
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link @if($loop->index == 0) active @endif"
                                                                id="{{ $key }}-tab" data-toggle="tab" data-target="#{{ $key }}"
                                                                type="button" role="tab" aria-controls="{{ $key }}"
                                                                aria-selected="true">{{ $language }}</button>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="tab-content" id="myTabContent">
                                                @foreach(config('app.languages') as $key=>$language)
                                                    <div class="tab-pane fade @if($loop->index == 0) show active in @endif"
                                                         id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">

                                                        <div class="form-group col-md-6">
                                                            <label for="name">{{ __('dict.category_name') }}</label>
                                                            <input type="text" name="{{ $key }}[name]" class="form-control"
                                                                   value="" placeholder="Enter name">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="desc">{{ __('dict.category_desc') }}</label>
                                                            <input type="text" name="{{ $key }}[desc]" class="form-control"
                                                                   value="" placeholder="Enter description">
                                                        </div>
{{--                                                        <div class="form-group col-md-6">--}}
{{--                                                            <label for="address">{{ __('dict.address') }}</label>--}}
{{--                                                            <input type="text" name="{{ $key }}[address]" class="form-control"--}}
{{--                                                                   value="{{ $settings->translate($key)->address }}"--}}
{{--                                                                   placeholder="Enter address">--}}
{{--                                                        </div>--}}

                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <!--/.card-->
                                <div class="row">

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
