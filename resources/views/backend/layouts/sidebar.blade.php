<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Comodo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->image)
                    <a href="{{ route('user.show', Auth::user()->id) }}"><img
                            src="{{ asset('images/' . Auth::user()->image) }}" class="img-circle elevation-2"
                            alt="User Image"></a>
                @endif
            </div>
            <div class="info">
                <a href="{{ route('user.show', Auth::user()->id) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('game.index') }}"
                        class="nav-link {{ request()->is('admin/game*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-gamepad"></i>
                        <p>Games</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ request()->is('admin/categor*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('gallery.index') }}"
                        class="nav-link {{ request()->is('admin/galler*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Galleries</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post.index') }}"
                        class="nav-link {{ request()->is('admin/post*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('faq.index') }}"
                        class="nav-link {{ request()->is('admin/faq*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>Faq</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banner.index') }}"
                        class="nav-link {{ request()->is('admin/banner*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order.index') }}"
                        class="nav-link {{ request()->is('admin/order*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about_us.index') }}"
                        class="nav-link {{ request()->is('admin/about-us*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>About us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('package.index') }}"
                        class="nav-link {{ request()->is('admin/package*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Packages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ratting.index') }}"
                        class="nav-link {{ request()->is('admin/rattings*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-star-half-alt"></i>
                        <p>User ratting</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer.index') }}"
                        class="nav-link {{ request()->is('admin/customer*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-portrait"></i>
                        <p>Customer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('footer_link.index') }}"
                        class="nav-link {{ request()->is('admin/footer_link*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-external-link-alt"></i>
                        <p>Footer link</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact_infor.index') }}"
                        class="nav-link {{ request()->is('admin/contact_infor*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-id-card-alt"></i>
                        <p>General infor</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
