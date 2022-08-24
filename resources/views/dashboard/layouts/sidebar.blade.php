<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard <span class="tag tag-info">NEW</span></a>
            </li>

            <li class="nav-title">
                Administrator Area
            </li>
{{--            <li class="nav-item nav-dropdown">--}}
{{--                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Components</a>--}}
{{--                <ul class="nav-dropdown-items">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="components-buttons.html"><i class="icon-puzzle"></i> Buttons</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="components-social-buttons.html"><i class="icon-puzzle"></i> Social Buttons</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="components-cards.html"><i class="icon-puzzle"></i> Cards</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="components-forms.html"><i class="icon-puzzle"></i> Forms</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="components-switches.html"><i class="icon-puzzle"></i> Switches</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="components-tables.html"><i class="icon-puzzle"></i> Tables</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="nav-item nav-dropdown">--}}
{{--                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-star"></i> Icons</a>--}}
{{--                <ul class="nav-dropdown-items">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="icons-font-awesome.html"><i class="icon-star"></i> Font Awesome</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="icons-simple-line-icons.html"><i class="icon-star"></i> Simple Line Icons</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="widgets.html"><i class="icon-calculator"></i> Widgets <span class="tag tag-info">NEW</span></a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.users.index') }}"><i class="icon-user"></i> {{ trans('dict.users') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.settings') }}"><i class="icon-settings"></i> {{ trans('dict.settings') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.categories.index') }}"><i class="icon-paper-clip"></i> {{ trans('dict.categories') }}</a>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                Editor Area
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-pencil"></i> {{ trans('dict.posts') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="icon-paper-clip"></i> {{ trans('dict.categories') }}</a>
            </li>
        </ul>
    </nav>
</div>
