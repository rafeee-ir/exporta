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
                    @can('post-list')

                    <li class="{{ request()->is('dashboard/posts*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-grid2-thumb"></i><span>Posts</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/posts') ? 'active' : '' }}"><a href="{{url('dashboard/posts')}}">All Posts</a></li>
                            <li class="{{ request()->is('dashboard/posts/create') ? 'active' : '' }}"><a href="{{url('dashboard/posts/create')}}">New Post</a></li>
{{--                            <li><a href="#">New Post</a></li>--}}
{{--                            <li><a href="#">Categories</a></li>--}}
{{--                            <li><a href="#">Labels</a></li>--}}
{{--                            <li><a href="#">Comments</a></li>--}}
                        </ul>
                    </li>
                    @endcan
                    @can('supplier-list')
                    <li class="{{ request()->is('dashboard/brands*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-apple"></i><span>Brands</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/brands') ? 'active' : '' }}"><a href="{{url('dashboard/brands')}}">All Brands</a></li>
                            @can('supplier-create')
                            <li class="{{ request()->is('dashboard/brands/create') ? 'active' : '' }}"><a href="{{url('dashboard/brands/create')}}">New Brand</a></li>
                            @endcan
                                {{--                            <li><a href="#">Categories</a></li>--}}
                        </ul>
                    </li>
                    @endcan
                    @can('product-list')
                    <li class="{{ request()->is('dashboard/products*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-package"></i><span>Products</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/products') ? 'active' : '' }}"><a href="{{url('dashboard/products')}}">All Products</a></li>
                            @can('product-create')
                            <li class="{{ request()->is('dashboard/products/create') ? 'active' : '' }}"><a href="{{url('dashboard/products/create')}}">New Product</a></li>
                            @endcan
{{--                            <li><a href="#">Categories</a></li>--}}
{{--                            <li><a href="#">Labels</a></li>--}}
                        </ul>
                    </li>
                    @endcan
                    @canany(['user-list','role-list'])
                    <li class="{{ request()->is('dashboard/users*') || request()->is('dashboard/roles*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i><span>Users</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/users*') && !request()->is('dashboard/users/create') ? 'active' : '' }}"><a href="{{url('dashboard/users')}}">Users</a></li>
                            @can('user-create')
                            <li class="{{ request()->is('dashboard/users/create') ? 'active' : '' }}"><a href="{{url('dashboard/users/create')}}">New User</a></li>
                            @endcan
                                @role('Admin')
                            <li class="{{ request()->is('dashboard/roles*') ? 'active' : '' }}"><a href="{{url('dashboard/roles')}}">Roles</a></li>
                            @endrole
                        </ul>
                    </li>
                    @endcanany
                    @can('faq-list')
                    <li class="{{ request()->is('dashboard/faqs*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-help"></i><span>FAQs</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/faqs') ? 'active' : '' }}"><a href="{{url('dashboard/faqs')}}">FAQs</a></li>
                            @can('faq-create')
                            <li class="{{ request()->is('dashboard/faqs/create') ? 'active' : '' }}"><a href="{{url('dashboard/faqs/create')}}">New FAQ</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('contact-list')
                    <li class="{{ request()->is('dashboard/contacts*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-envelope"></i><span>Contacts</span></a>
                        <ul class="collapse">
                            <li class="{{ request()->is('dashboard/contacts') ? 'active' : '' }}"><a href="{{url('dashboard/contacts')}}">All Contacts</a></li>
                        </ul>
                    </li>
                    @endcan

{{--                    <li>--}}
{{--                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i><span>Setting</span></a>--}}
{{--                        <ul class="collapse">--}}
{{--                            <li><a href="#">Homepage</a></li>--}}
{{--                            <li><a href="#">Posts</a></li>--}}
{{--                            <li><a href="#">Brands</a></li>--}}
{{--                            <li><a href="#">Products</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
            </nav>
        </div>
    </div>
</div>
