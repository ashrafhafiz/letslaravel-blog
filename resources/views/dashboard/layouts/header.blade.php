<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>

            <li class="nav-item p-x-1">
                <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="nav-item p-x-1">
                <a class="nav-link" href="{{ route('dashboard.users.index') }}">Users</a>
            </li>
            <li class="nav-item p-x-1">
                <a class="nav-link" href="{{ route('dashboard.settings') }}">Settings</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down">
            {{--            --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <span class="hidden-md-down">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <strong>Select Language</strong>
                    </div>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <i class="fa fa-flag"></i>
                            {{ $properties['native'] }}
                            <span class="tag tag-danger">42</span>
                        </a>
                    @endforeach
                </div>
            </li>
            {{--            --}}
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-list"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/dashboard/img/avatars/6.jpg') }}" class="img-avatar"
                         alt="admin@bootstrapmaster.com">
                    <span class="hidden-md-down">admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span
                            class="tag tag-info">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span
                            class="tag tag-success">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span
                            class="tag tag-danger">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span
                            class="tag tag-warning">42</span></a>
                    <div class="dropdown-header text-xs-center">
                        <strong>Settings</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span
                            class="tag tag-default">42</span></a>
                    <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="tag tag-primary">42</span></a>
                    <div class="divider"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-toggler aside-toggle" href="#">&#9776;</a>
            </li>

        </ul>
    </div>
</header>
