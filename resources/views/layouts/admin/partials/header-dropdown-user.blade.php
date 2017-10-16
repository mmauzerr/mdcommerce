<ul class="nav navbar-top-links navbar-right">        
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{ auth()->user()->name }} <i class="fa fa-caret-down"></i> 
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="{{ route('users-edit', auth()->user()->id) }}"><i class="fa fa-user fa-fw"></i> Change Profile</a>
            </li>
            <li><a href="{{ route('users-change-password', auth()->user()->id) }}"><i class="fa fa-lock fa-fw"></i> Change Password</a>
            </li>
            <li class="divider"></li>
            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
