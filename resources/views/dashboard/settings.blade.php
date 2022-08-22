@extends('dashboard.layout.layout')

@section('main')
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/settings">Settings</a></li>

            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                    <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
                    <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
                </div>
            </li>
        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <form action="{{ route('dashboard.settings.update', $settings) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="card">
                            <div class="card-header">
                                <strong class="font-2xl">Settings</strong> Form
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="logo">{{ __('dict.logo') }}</label>
                                        <input type="file" name="logo" class="form-control" placeholder="Enter logo...">
                                        @if ($errors->has('logo'))
                                            <span class="text-danger">{{ $errors->first('logo') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="" class="d-block">{{ __('dict.current_logo') }}</label>
                                        <img src="{{ asset($settings->logo) }}" alt="logo" width="50" class="d-block">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="favicon">{{ __('dict.favicon') }}</label>
                                        <input type="file" name="favicon" class="form-control"
                                               placeholder="Enter favicon...">
                                        @if ($errors->has('favicon'))
                                            <span class="text-danger">{{ $errors->first('favicon') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="" class="d-block">{{ __('dict.current_favicon') }}</label>
                                        <img src="{{ asset($settings->favicon) }}" alt="favicon" width="25" class="d-block">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="facebook">{{ __('dict.facebook') }}</label>
                                    <input type="text" name="facebook" class="form-control"
                                           value="{{ $settings->facebook }}" placeholder="Enter facebook address">
                                    @if ($errors->has('facebook'))
                                        <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="instagram">{{ __('dict.instagram') }}</label>
                                    <input type="text" name="instagram" class="form-control"
                                           value="{{ $settings->instagram }}" placeholder="Enter instagram address">
                                    @if ($errors->has('instagram'))
                                        <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">{{ __('dict.phone') }}</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $settings->phone }}"
                                           placeholder="Enter phone number">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('dict.email') }}</label>
                                    <input type="email" name="email" class="form-control" value="{{ $settings->email }}"
                                           placeholder="Enter email address">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/row-->

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
                                                <label for="title">{{ __('dict.title') }}</label>
                                                <input type="text" name="{{ $key }}[title]" class="form-control"
                                                       value="{{ $settings->translate($key)->title }}"
                                                       placeholder="Enter title">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="desc">{{ __('dict.desc') }}</label>
                                                <input type="text" name="{{ $key }}[desc]" class="form-control"
                                                       value="{{ $settings->translate($key)->desc }}"
                                                       placeholder="Enter description">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="address">{{ __('dict.address') }}</label>
                                                <input type="text" name="{{ $key }}[address]" class="form-control"
                                                       value="{{ $settings->translate($key)->address }}"
                                                       placeholder="Enter address">
                                            </div>

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                    <!--/.card-->
                    <div class="row">
                        <div class="card">
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <button class="btn btn-danger">Cancel</button>
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
