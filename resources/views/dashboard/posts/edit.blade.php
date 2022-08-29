@extends('dashboard.layouts.layout')

@section('main')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">{{ __('dict.home') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('dict.dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">{{ __('dict.posts') }}</a></li>
            <li class="breadcrumb-item active"><strong>{{ __('dict.edit_post') }}</strong></li>
        </ol>

        <div class="container-fluid">
            <div class="animated fadeIn">

                <form action="{{ route('dashboard.posts.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="card">
                            <div class="card-header">
                                <strong class="font-2xl">Edit Post</strong> Form
                            </div>
                            <div class="card-block">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="category">Post Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select Post Category</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" @selected($item->id == $category->id)>
                                                    {{ $item->translate(app()->getLocale())->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <strong class="font-2xl">Translation</strong> Form
                                    </div>
                                    <div class="card-block">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            @foreach (config('app.languages') as $key => $language)
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link @if ($loop->index == 0) active @endif"
                                                        id="{{ $key }}-tab" data-toggle="tab"
                                                        data-target="#{{ $key }}" type="button" role="tab"
                                                        aria-controls="{{ $key }}"
                                                        aria-selected="true">{{ $language }}</button>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            @foreach (config('app.languages') as $key => $language)
                                                <div class="tab-pane fade @if ($loop->index == 0) show active in @endif"
                                                    id="{{ $key }}" role="tabpanel"
                                                    aria-labelledby="{{ $key }}-tab">

                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <label for="title">{{ __('dict.post_title') }}</label>
                                                            <input type="text" name="{{ $key }}[title]"
                                                                class="form-control"
                                                                value="{{ $post->translate($key)->title }}"
                                                                placeholder="Enter title">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="shortDesc">{{ __('dict.shortDesc') }}</label>
                                                            <input type="text" name="{{ $key }}[shortDesc]"
                                                                class="form-control"
                                                                value="{{ $post->translate($key)->shortDesc }}"
                                                                placeholder="Enter description">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="content">{{ __('dict.post_content') }}</label>
                                                            <textarea type="text" name="{{ $key }}[content]" class="form-control"
                                                                value="{{ $post->translate($key)->content }}" placeholder="Enter content"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">{{ __('dict.submit') }}</button>
                                <a class="btn btn-danger" href="{{ url()->previous() }}">{{ __('dict.cancel') }}</a>
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
