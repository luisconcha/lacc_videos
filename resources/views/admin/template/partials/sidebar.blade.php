<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{\Auth::user()->thumb_small_asset}}" class="img-circle" alt="User Image"/>
        </div>
        <div class="pull-left info">
            <p><span class="name-user">Hello,{{ auth()->user()->name }}</span></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
                                            class="fa fa-search"></i></button>
                            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href="{{route('admin.dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span>
                <small class="badge pull-right bg-green">new</small>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.users.index')}}"><i class="fa fa-angle-double-right"></i> List</a></li>
                <li><a href="{{route('admin.trashed.users.index')}}"><i class="fa fa-trash"></i>Users in the trash</a></li>
                        charts</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-university"></i>
                <span>Categories</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.categories.index')}}"><i class="fa fa-angle-double-right"></i> List</a></li>
                <li><a href="{{route('admin.trashed.categories.index')}}"><i class="fa fa-trash"></i>Categories in the trash</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Series</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.series.index')}}"><i class="fa fa-angle-double-right"></i> List</a></li>
                <li><a href="{{route('admin.trashed.series.index')}}"><i class="fa fa-trash"></i>Series in the trash</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-film"></i> <span>Videos</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.videos.index')}}"><i class="fa fa-angle-double-right"></i> List</a>
                </li>
                <li><a href="{{route('admin.trashed.videos.index')}}"><i class="fa fa-trash"></i>Videos in the trash</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>Sales</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.plans.index')}}"><i class="fa fa-angle-double-right"></i>Plans</a></li>
                <li><a href="{{route('admin.web_profile.index')}}"><i class="fa fa-angle-double-right"></i>Profile Paypal</a></li>
                <li class="divider"></li>
                <li><a href="{{route('admin.trashed.plans.index')}}"><i class="fa fa-trash"></i>Plans in the trash</a></li>
                <li><a href="{{route('admin.trashed.web_profile.index')}}"><i class="fa fa-trash"></i>Profile Paypal in the trash</a></li>
            </ul>
        </li>
        <li>
            <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="badge pull-right bg-red">3</small>
            </a>
        </li>
        <li>
            <a href="pages/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="badge pull-right bg-yellow">12</small>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a>
                </li>
                <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a>
                </li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a>
                </li>
                <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a>
                </li>
                <li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a>
                </li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a>
                </li>
            </ul>
        </li>
    </ul>
</section>