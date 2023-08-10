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
                @if (Auth::user()->type == 'Admin')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-users"></span><span class="mtext">Admin</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.index') }}" class="{{ Request::is('user') ? 'active' : '' }}">
                                    <span class="micon fa fa-user"></span>
                                    <span class="ml-2 title">Users</span>
                                </a></li>
                            <li><a href="{{ route('permission.index') }}"
                                    class="{{ Request::is('permission') ? 'active' : '' }}">
                                    <span class="micon fa fa-unlock-alt"></span>
                                    <span class="ml-2 title">Permissions</span>
                                </a></li>
                            <li><a href="{{ route('role.index') }}" class="{{ Request::is('role') ? 'active' : '' }}">
                                    <span class="micon fa fa-briefcase"></span>
                                    <span class="ml-2 title">Roles</span>
                                </a></li>
                            <li><a href="{{ route('auth.auth_logs') }}"
                                    class="{{ Request::is('auth') ? 'active' : '' }}">
                                    <span class="micon bi bi-shield-lock-fill"></span>
                                    <span class="ml-2 title">Authentication Logs</span>
                                </a></li>
                            <li><a href="{{ url('log-viewer') }}"
                                    class="{{ Request::is('log-viewer') ? 'active' : '' }}">
                                    <span class="micon fa fa-dashboard"></span>
                                    <span class="ml-2 title">Log Viewer</span>
                                </a></li>
                            <li><a href="{{ url('admin/user-activity') }}"
                                    class="{{ Request::is('admin/user-activity') ? 'active' : '' }}">
                                    <span class="micon bi bi-activity"></span>
                                    <span class="ml-2 title">User Activity</span>
                                </a></li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->type == 'Admin' || 'Manager')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-cog"></span><span class="mtext">Client Setting</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('currency.index') }}"
                                    class="{{ Request::is('currency') ? 'active' : '' }}">
                                    <span class="micon fa fa-money"></span>
                                    <span class="ml-2 title">Currency</span>
                                </a></li>
                            <li><a href="{{ route('transaction-type.index') }}"
                                    class="{{ Request::is('transaction-type') ? 'active' : '' }}">
                                    <span class="micon fa fa-credit-card-alt"></span>
                                    <span class="ml-2 title">Transaction Types</span>
                                </a></li>
                            <li><a href="{{ route('income-source.index') }}"
                                    class="{{ Request::is('income-source') ? 'active' : '' }}">
                                    <span class="micon fa fa-database"></span>
                                    <span class="ml-2 title">Income Sources</span>
                                </a></li>
                            <li><a href="{{ route('client-status.index') }}"
                                    class="{{ Request::is('client-status') ? 'active' : '' }}">
                                    <span class=" fa fa-server"></span>
                                    <span class="ml-2 title">Client Statuses</span>
                                </a></li>
                            <li><a href="{{ route('project-status.index') }}"
                                    class="{{ Request::is('project-status') ? 'active' : '' }}">
                                    <span class=" fa fa-server"></span>
                                    <span class="ml-2 title">Project Statuses</span>
                                </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-briefcase"></span><span class="mtext">Client Management</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('client.index') }}"
                                    class="{{ Request::is('client') ? 'active' : '' }}">
                                    <span class="micon fa fa-user-plus"></span>
                                    <span class="ml-2 title">Clients</span>
                                </a></li>
                            <li><a href="{{ route('project.index') }}"
                                    class="{{ Request::is('project') ? 'active' : '' }}">
                                    <span class="micon fa fa-briefcase"></span>
                                    <span class="ml-2 title">Projects</span>
                                </a></li>
                            <li><a href="{{ route('note.index') }}" class="{{ Request::is('note') ? 'active' : '' }}">
                                    <span class="micon fa fa-sticky-note"></span>
                                    <span class="ml-2 title">Notes</span>
                                </a></li>
                            <li><a href="{{ route('document.index') }}"
                                    class="{{ Request::is('document') ? 'active' : '' }}">
                                    <span class="micon fa fa-file"></span>
                                    <span class="ml-2 title">Documents</span>
                                </a></li>
                            <li><a href="{{ route('transaction.index') }}"
                                    class="{{ Request::is('transaction') ? 'active' : '' }}">
                                    <span class="micon fa fa-credit-card"></span>
                                    <span class="ml-2 title">Transactions</span>
                                </a></li>
                            <li><a href="{{ route('client.report') }}"
                                    class="{{ Request::is('clients/report') ? 'active' : '' }}">
                                    <span class="micon fa fa-line-chart"></span>
                                    <span class="ml-2 title">Reports</span>
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('plan.index') }}"
                            class="dropdown-toggle no-arrow {{ Request::is('plans') ? 'active' : '' }}">
                            <span class="micon bi bi-credit-card-fill" aria-hidden="true"></span><span
                                class="mtext">Plans</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->type == 'Admin' || 'Manager' || 'Developer')
                    <li>
                        <a href="{{ route('pricing') }}"
                            class="dropdown-toggle no-arrow {{ Request::is('pricing') ? 'active' : '' }}">
                            <span class="micon bi bi-cart3" aria-hidden="true"></span><span
                                class="mtext">Pricing</span>
                        </a>
                    </li>
                @endif
                {{-- <li>
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
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
