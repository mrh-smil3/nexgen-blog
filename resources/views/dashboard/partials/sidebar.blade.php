<div class="logo">
    <a href="{{ route('dashboard') }}" class="logo-icon"><span class="logo-text">Next Gen</span></a>
    <div class="sidebar-user-switcher user-activity-online">
        <a href="{{ route('dashboard') }}">
            @if (Auth::user()->image && file_exists(public_path('storage/' . Auth::user()->image)))
                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Picture">
            @elseif (Auth::user()->image)
                <img src="{{ Auth::user()->image }}" alt="Profile Picture">
            @else
                <img src="{{ asset('default-avatar.png') }}" alt="">
            @endif
            <span class="activity-indicator"></span>
            <span class="user-info-text">{{ Auth::user()->full_name }}<br><span
                    class="user-state-info">{{ Auth::user()->roles->name }}</span></span>
        </a>
    </div>
</div>
<div class="app-menu">
    <ul class="accordion-menu">
        <li class="sidebar-title">
            Visit Site
        </li>
        <li class="">
            <a href="/" class=""><i class="material-icons-two-tone">
                    preview
                </i>Visit Site</a>
        </li>
        <li class="sidebar-title">
            Apps
        </li>
        <li class="active-page">
            <a href="{{ route('dashboard') }}" class="active"><i
                    class="material-icons-two-tone">dashboard</i>Dashboard</a>
        </li>
        @can('admin')
            <li>
                <a href="{{ route('dashboard.user') }}"><i class="material-icons-two-tone">grid_on</i>Manage User<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('dashboard.user') }}">Manage User</a>
                    </li>
                </ul>
            </li>
        @endcan

        <li>
            <a href="#"><i class="material-icons-two-tone">newspaper</i>Blog Manajement<i
                    class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{ route('dashboard.posts') }}">Posts</a>
                </li>
                @can('admin')
                    <li>
                        <a href="{{ route('dashboard.posts.category') }}">Kategori Posts</a>
                    </li>
                @endcan
            </ul>
        </li>


        {{-- @role('super admin') --}}
        {{-- super admin --}}
        {{-- <li class="sidebar-title">
                Super Admin
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">color_lens</i>Manajement Admin<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="styles-typography.html">Data Admin</a>
                    </li>
                    <li>
                        <a href="styles-code.html">Create Admin</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">grid_on</i>Pengaturan Situs<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="tables-basic.html">Setting Situs</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">grid_on</i>Manajemen Database<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="tables-basic.html">BackUp</a>
                    </li>
                    <li>
                        <a href="tables-basic.html">Import</a>
                    </li>
                    <li>
                        <a href="tables-basic.html">Eksport</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="material-icons-two-tone">card_giftcard</i>Manajemen Role User<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="components-accordions.html">Roles user</a>
                    </li>

                </ul>
            </li> --}}
        {{-- @endrole --}}



        {{-- @role(['admin', 'super admin']) --}}
        {{-- <li class="sidebar-title">
                Admin
            </li>
            <li>
                <a href="{{ route('template') }}"><i class="material-icons-two-tone">widgets</i>Template Manajemen</a>
            </li>
            <li>
                <a href="{{ route('transaction.admin') }}"><i class="material-icons-two-tone">widgets</i>Transaction
                    Manajemen</a>
            </li>
            <li>
                <a href="widgets.html"><i class="material-icons-two-tone">price_change</i>Pricing Manajemen</a>
            </li>
            <li>
                <a href="widgets.html"><i class="material-icons-two-tone">ballot</i>About Manajemen</a>
            </li>
            <li>
                <a href="widgets.html"><i class="material-icons-two-tone"><span class="material-icons">
                            donut_small
                        </span></i>Service Manajemen</a>
            </li>
            <li>
                <a href="{{ route('projects') }}"><i class="material-icons-two-tone">text_snippet</i>project Manajemen</a>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">analytics</i>Kategori Manajemen<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('template.kategori') }}">Kategori template</a>
                    </li>
                    <li>
                        <a href="{{ route('class-category') }}">Kategori Class</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="material-icons-two-tone">newspaper</i>Blog Manajement<i
                        class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('dashboard.blog') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.blog.category') }}">Kategori Blog</a>
                    </li>
                </ul>
            </li> --}}
        {{-- @endrole --}}

        <li class="sidebar-title">
            Logout
        </li>
        <li class="ms-4">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="border-0 bg-transparent d-flex align-items-center hover:text-primary"
                    style="color: grey; "><i class="material-icons-two-tone">logout</i>Logout</button>
            </form>
        </li>
    </ul>
</div>
