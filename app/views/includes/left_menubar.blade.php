            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="@if(Request::segment(1)=='dashboard') active @endif">
                            <a href="{{ URL::route('home') }}">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </a>
                        </li>

                        <li class="treeview @if(Request::segment(1) == 'projects') active @endif">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Projects</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="@if(Request::segment(1) == 'projects' and Request::segment(2) != 'all') active @endif"><a href="{{ URL::route('new_project') }}"><i class="fa fa-angle-double-right"></i> Add New</a></li>
                                <li class="@if(Request::segment(1) == 'projects' and Request::segment(2) == 'all') active @endif"><a href="{{ URL::route('all_project') }}"><i class="fa fa-angle-double-right"></i> All Projects</a></li>
                            </ul>
                        </li>

                        <li class="treeview @if(Request::segment(1) == 'clients') active @endif">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Clients</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="@if(Request::segment(1) == 'clients' and Request::segment(2) !='all') active @endif"><a href="{{URL::route('add_client')}}"><i class="fa fa-angle-double-right"></i> Add New</a></li>
                                <li class="@if(Request::segment(1) == 'clients' and Request::segment(2) == 'all') active @endif"><a href="{{URL::route('all_client')}}"><i class="fa fa-angle-double-right"></i> All Clients</a></li>
                            </ul>
                        </li>

                        <li class="treeview @if(Request::segment(1) == 'marketplaces') active @endif">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Marketplace</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="@if(Request::segment(1) == 'marketplaces' and Request::segment(2) != 'all') active @endif"><a href="{{ URL::route('add_marketplace') }}"><i class="fa fa-angle-double-right"></i> Add New</a></li>
                                <li class="@if(Request::segment(1) == 'marketplaces' and Request::segment(2) == 'all') active @endif"><a href="{{ URL::route('all_marketplace') }}"><i class="fa fa-angle-double-right"></i> All Marketplace</a></li>
                            </ul>
                        </li>

                        <li class="treeview @if(Request::segment(1) == 'users') active @endif">
                            <a href="#">
                                <i class="fa fa-user"></i> <span>User Account</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="@if(Request::segment(1) == 'users' and Request::segment(2) == 'password') active @endif"><a href="{{ URL::route('pass') }}"><i class="fa fa-angle-double-right"></i> Change Password</a></li>
                                <li class="@if(Request::segment(1) == 'users' and Request::segment(2) == 'profile') active @endif"><a href="{{ URL::route('profile_edit') }}"><i class="fa fa-angle-double-right"></i> User Profile</a></li>
                            </ul>
                        </li>

                        <li class="@if(Request::segment(1) == 'reports') active @endif">
                            <a href="{{URL::route('report')}}">
                                <i class="fa fa-bar-chart-o"></i> <span>Reports</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>