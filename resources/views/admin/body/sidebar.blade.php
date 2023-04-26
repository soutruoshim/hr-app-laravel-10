@php
$id = Auth::user()->id;
$userid = App\Models\User::find($id);
$status = $userid->status;

@endphp


<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                @if($status == 'active')

                <li class="menu-title mt-2">Menu</li>

                @if(Auth::user()->can('company.setup'))
                <li>
                    <a href="#sidebarCompany" data-bs-toggle="collapse">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span> Company Setup </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCompany">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('company'))
                            <li>
                                <!-- <a href="{{ route('all.category') }}">Company</a> -->
                                <a href="{{ route('company') }}">Company</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('branch'))
                            <li>
                                <a href="{{ route('all.branch') }}">Branch</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('department'))
                            <li>
                                <a href="{{ route('all.department') }}">Department</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('position'))
                            <li>
                                <a href="{{ route('all.position') }}">Position</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('shifttime.management'))
                <li>
                    <a href="#sidebarEcommerce1" data-bs-toggle="collapse">
                        <i class="mdi mdi-calendar-clock"></i>
                        <span> Shift Time </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce1">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('shifttime'))
                            <li>
                                <a href="{{ route('all.shifttime') }}">Shift Time</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('employee.management'))
                <li>
                    <a href="#sidebarEmployee" data-bs-toggle="collapse">
                    <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Employee </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmployee">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('employees'))
                            <li>
                                <a href="{{ route('all.employee') }}">Employees</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                <li>
                    <a href="#sidebarpermission" data-bs-toggle="collapse">
                        <i class="mdi mdi-book-multiple"></i>
                        <span> Leave </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarpermission">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.permission') }}">Leave Type</a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles') }}">Leave Request</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="#">
                        <i class="mdi mdi-calendar-multiple-check"></i>
                        <span> Attendance </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-message-video"></i>
                        <span> Team meeting </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-calendar-remove"></i>
                        <span> Holiday </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-calendar-text"></i>
                        <span> Notice </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-content-paste"></i>
                        <span> Content management </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Setting</li>


                @if(Auth::user()->can('setting.menu'))

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Setting Admin User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admin') }}">All Admin</a>
                            </li>

                            <li>
                                <a href="{{ route('add.admin') }}">Add Admin </a>
                            </li>


                        </ul>
                    </div>
                </li>
                @endif



                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Roles And Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.permission') }}">All Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles') }}">All Roles</a>
                            </li>

                            <li>
                                <a href="{{ route('add.roles.permission') }}">Roles in Permission</a>
                            </li>

                            <li>
                                <a href="{{ route('all.roles.permission') }}">All Roles in Permission</a>
                            </li>

                        </ul>
                    </div>
                </li>




                @endif


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
