<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Menus<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('menus-list') }}">Preview all</a>
                    </li>
                    <li>
                        <a href="{{ route('menus-create') }}">New menu item</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="#"><i class="fa fa-file-text fa-fw"></i> Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('pages-list') }}">Preview all</a>
                    </li>
                    <li>
                        <a href="{{ route('pages-create') }}">New page</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Products<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('products-list')}}">Preview all products</a>
                    </li>
                    <li>
                        <a href="{{route('products-create')}}">New product</a>
                    </li>
                    <li class="divider">
                            
                    </li>
                    <li>
                        <a href="{{route('products-category-list')}}">Preview all categories</a>
                    </li>
                    <li>
                        <a href="{{route('products-category-create')}}">New category product</a>
                    </li>
                    
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li>
                <a href="#"><i class="fa fa-dollar"></i> Prices<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('products-prices-list') }}">Preview all</a>
                    </li>
                    <li>
                        <a href="{{ route('products-prices-create') }}">New price</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            @if(auth()->check() && auth()->user()->role == \App\User::ROLE_ADMINISTRATOR)
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Admin users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('users-list') }}">Preview all</a>
                    </li>
                    <li>
                        <a href="{{ route('users-create') }}">New user</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
