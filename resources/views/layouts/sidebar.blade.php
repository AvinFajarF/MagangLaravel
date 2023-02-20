<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('vendor/admin-lte/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->images)
                    <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="img-circle elevation-2"
                        alt="User Image">
                @else
                    <img id="images-default" src="{{ asset('images/person-default-23122312.gif') }}" class="img-circle "
                        alt="User Image">
                @endif
            </div>

            <div class="info">
                <a href="{{ route('my.profile.index') }}" class="d-block">{{ auth()->user()->name }}</a>

            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ Route::is('home') || Route::is('') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>

                {{-- Tag --}}
                <li class="nav-item has-treeview {{ Request::is('tag*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('tag*') ? 'active' : '' }}">
                        <i class="bi bi-tags"></i>
                        <p>
                            Tags
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tag.TagView') }}"
                                class="nav-link {{ Request::is('tag.TagView') ? 'active' : '' }}">
                                <i class="bi bi-list"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tag.TagCreate') }}"
                                class="nav-link {{ Route::is('tag.TagCreate') ? 'active' : '' }}">
                                <i class="bi bi-plus"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Category --}}
                <li class="nav-item has-treeview {{ Request::is('categories*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                        <i class="bi bi-bookmarks-fill"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.categoriesView') }}"
                                class="nav-link {{ Request::is('categories.categoriesView') ? 'active' : '' }}">
                                <i class="bi bi-list"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.categoriesCreate') }}"
                                class="nav-link {{ Route::is('categories.categoriesCreate') ? 'active' : '' }}">
                                <i class="bi bi-plus"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Posts --}}
                <li class="nav-item has-treeview {{ Request::is('posts*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('posts*') ? 'active' : '' }}">
                        <i class="bi bi-file-post"></i>
                        <p>
                            Posts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}"
                                class="nav-link {{ Request::is('categories.categoriesView') ? 'active' : '' }}">
                                <i class="bi bi-list"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.create') }}"
                                class="nav-link {{ Route::is('categories.categoriesCreate') ? 'active' : '' }}">
                                <i class="bi bi-plus"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- UserList --}}
                @if (Auth::user()->role == 'superadmin')
                    <li class="nav-item ms-1">
                        <a href="{{ route('user.index') }}"
                            class="nav-link {{ Route::is('user.index') || Route::is('user.detail') ? 'active' : '' }}">
                            <i class="bi  bi-people-fill"></i>
                            <p class="ms-2">
                                User
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
            </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
