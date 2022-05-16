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
                                <i data-feather="grid"></i>
                                <span data-key="t-apps">Apps</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li>
                                    <a href="#">
                                        <span data-key="t-calendar">Calendar</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <span data-key="t-chat">Chat</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="users"></i>
                                <span data-key="t-authentication">Authentication</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="#" data-key="t-login">Login</a></li>
                                <li><a href="#" data-key="t-register">Register</a></li>
                            </ul>
                        </li>

                        <li class="menu-title mt-2" data-key="t-components">Elements</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="briefcase"></i>
                                <span data-key="t-components">Components</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="#" data-key="t-alerts">Alerts</a></li>
                                <li><a href="#" data-key="t-buttons">Buttons</a></li>
                                <li><a href="#" data-key="t-cards">Cards</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
