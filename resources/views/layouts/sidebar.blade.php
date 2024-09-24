<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ url('/home') }}">
            {{ config('app.name', 'Steadfast IT') }}

        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
            </div>
            <div class="user-info">
                <h5 class=" mb-1">{{ Auth::user()->name ?? '' }} <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
            </div>
        </div>
    </div>

    <ul class="side-menu app-sidebar3">
        @if (Auth::user() && Auth::user()->access_type == 'user')
            <li class="side-item side-item-category mt-4">Main</li>
            <li class="slide">
                <a class="side-menu__item"  href="{{ route('home') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Dashboard</span></a>
            </li>
            <li class="side-item side-item-category">User</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
                <span class="side-menu__label">Data Collection</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ route('user.data.index') }}" class="slide-item">Data List</a></li>
                </ul>
            </li>
        @endif

        @if (Auth::user() && Auth::user()->access_type =='admin')
            <li class="side-item side-item-category">Category</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/></svg>
                <span class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu ">
                    <li class="sub-slide">
                        <a class="sub-side-menu__item" data-toggle="sub-slide" href="index-2.html#"><span class="sub-side-menu__label">Category</span><i class="sub-angle fe fe-chevron-down"></i></a>
                        <ul class="sub-slide-menu">
                            <li><a class="sub-slide-item" href="{{ route('admin.category.index') }}">Category List</a></li>
                        </ul>
                    </li>

                </ul>
            </li>

            <li class="side-item side-item-category">User</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
                <span class="side-menu__label">User List</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">
                    <li><a href="{{ route('admin.user.index') }}" class="slide-item">User List</a></li>
                </ul>
            </li>
        @endif
        <li class="side-item side-item-category">Url Shorter</li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
            <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
            <span class="side-menu__label">Url List</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ route('url.index') }}" class="slide-item">Url List</a></li>
            </ul>
        </li>


    </ul>
</aside>
