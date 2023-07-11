<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="">
            <a href="{{url('dashboard')}}">
                <h3>{{config('app.name')}}</h3>
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{url('dashboard')}}">Overview</a></li>
                            <li><a href="{{url('/')}}" target="_blank">Visit Site!</a></li>
{{--                            <li class="{{ request()->is('dashboard/notifications') ? 'active' : '' }}"><a href="{{url('dashboard/notifications')}}">All Notifications</a></li>--}}
                        </ul>
                    </li>

                    <li class="{{ request()->is('dashboard/posts') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-grid2-thumb"></i><span>Posts</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/posts') ? 'active' : '' }}"><a href="{{url('dashboard/posts')}}">All Posts</a></li>
                            <li><a href="#">New Post</a></li>
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">Labels</a></li>
                            <li><a href="#">Comments</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('dashboard/brands') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-apple"></i><span>Brands</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/brands') ? 'active' : '' }}"><a href="{{url('dashboard/brands')}}">All Brands</a></li>
                            <li><a href="#">New Brand</a></li>
                            <li><a href="#">Categories</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('dashboard/products') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-package"></i><span>Products</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/products') ? 'active' : '' }}"><a href="{{url('dashboard/products')}}">All Products</a></li>
                            <li><a href="#">New Product</a></li>
                            <li><a href="#">Categories</a></li>
                            <li><a href="#">Labels</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('dashboard/users') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Users</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/users') ? 'active' : '' }}"><a href="{{url('dashboard/users')}}">Users</a></li>
                            <li><a href="#">New User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i><span>Setting</span></a>
                        <ul class="collapse">
                            <li><a href="#">Homepage</a></li>
                            <li><a href="#">Posts</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Products</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
