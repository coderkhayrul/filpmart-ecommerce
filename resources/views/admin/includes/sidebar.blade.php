        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i data-feather="home"></i>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>
                                <span data-key="t-authentication">Users</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('user.index') }}">All User</a></li>
                                <li><a href="{{ route('user.create') }}">Add User</a></li>
                            </ul>
                        </li>

                        <li class="menu-title mt-2" data-key="t-components">Advance Manage</li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="image"></i>
                                <span data-key="t-banners">Banner</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('banner.index') }}">All Banner</a></li>
                                <li><a href="{{ route('banner.create') }}">Add Banner</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="settings"></i>
                                <span data-key="t-settings">Settings</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('manage.basic.index') }}">Basic Information</a></li>
                                <li><a href="{{ route('manage.contact.index') }}">Contact Information</a></li>
                                <li><a href="{{ route('manage.social.index') }}">Social Media</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.blank') }}">
                                <i class="bx bx-file-blank"></i>
                                <span data-key="t-dashboard">Blank</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
