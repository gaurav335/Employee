<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('admin.dashboard')}}" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">Datta Able</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu</label>
                </li>
                <li data-username="Table bootstrap datatable footable" class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                
                
                <li data-username="Table bootstrap datatable footable" class="nav-item">
                    <a href="{{ route('admin.designation.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Designation</span></a>
                </li>

                <li data-username="Table bootstrap datatable footable" class="nav-item">
                    <a href="{{ route('admin.department.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Department</span></a>
                </li>

                <li data-username="Table bootstrap datatable footable" class="nav-item">
                    <a href="{{ route('admin.employee.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Employee</span></a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>