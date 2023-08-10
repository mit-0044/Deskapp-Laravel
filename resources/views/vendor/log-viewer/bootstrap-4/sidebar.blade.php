<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="{{ URL::asset('images/deskapp-logo.svg') }}" alt="" class="dark-logo" />
            <img src="{{ URL::asset('images/deskapp-logo-white.svg') }}" alt="" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('dashboard') ? 'active' : '' }}">
                        <span class="micon fa fa-home" aria-hidden="true"></span><span class="mtext">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-person-fill"></span><span class="mtext">Admin</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('user.index') }}" class="{{ Request::is('user') ? 'active' : '' }}">
                                <span class="micon fa fa-user"></span>
                                <span class="ml-2 title">User Management</span>
                            </a></li>
                        <li><a href="{{ route('role.index') }}" class="{{ Request::is('role') ? 'active' : '' }}">
                                <span class="micon fa fa-tasks"></span>
                                <span class="ml-2 title">Role Management</span>
                            </a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-clock-history"></span><span class="mtext">Logs</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('log-viewer') }}"
                                class="{{ Request::is('log-viewer') ? 'active' : '' }}">
                                <span class="micon fa fa-dashboard"></span>
                                <span class="ml-2 title">Log Viewer</span>
                            </a></li>
                        <li><a href="{{ route('auth.authentications') }}"
                                class="{{ Request::is('authentications') ? 'active' : '' }}">
                                <span class=" fa fa-sign-in"></span>
                                <span class="ml-2 title">Authentication Logs</span>
                            </a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('employee.index') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('employee') ? 'active' : '' }}">
                        <span class="micon fa fa-list" aria-hidden="true"></span><span class="mtext">Employees</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('debit_card.index') }}"
                        class="dropdown-toggle no-arrow {{ Request::is('debit_card') ? 'active' : '' }}">
                        <span class="micon fa fa-file" aria-hidden="true"></span><span class="mtext">Debit Card
                            Applications</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
