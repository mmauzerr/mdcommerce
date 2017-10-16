<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-topbar c-topbar-light c-solid-bg">
        <div class="container">
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-left">
                <ul class="c-icons c-theme-ul">
                    <li>
                        <a href="#">
                            <i class="icon-social-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-social-dribbble"></i>
                        </a>
                    </li>
                    <li class="hide">
                        <span>Phone: +99890345677</span>
                    </li>
                </ul>
            </nav>
            <!-- END: INLINE NAV -->
            <!-- BEGIN: INLINE NAV -->
            <nav class="c-top-menu c-pull-right">
                <ul class="c-links c-theme-ul">
                    <li>
                        <a href="#">Help</a>
                    </li>
                    <li class="c-divider">|</li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li class="c-divider">|</li>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                </ul>
                <ul class="c-ext c-theme-ul">
                    <li class="c-lang dropdown c-last">
                        <a href="#">en</a>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li class="active">
                                <a href="#">English</a>
                            </li>
                            <li>
                                <a href="#">German</a>
                            </li>
                            <li>
                                <a href="#">Espaniol</a>
                            </li>
                            <li>
                                <a href="#">Portugise</a>
                            </li>
                        </ul>
                    </li>
                    <li class="c-search hide">
                        <!-- BEGIN: QUICK SEARCH -->
                        <form action="#">
                            <input type="text" name="query" placeholder="search..." value="" class="form-control" autocomplete="off">
                            <i class="fa fa-search"></i>
                        </form>
                        <!-- END: QUICK SEARCH -->
                    </li>
                </ul>
            </nav>
            <!-- END: INLINE NAV -->
        </div>
    </div>
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <a href="index.html" class="c-logo">
                        <img src="#" alt="MD-COMMERCE" class="c-desktop-logo">
                        <img src="#" alt="MD-COMMERCE" class="c-desktop-logo-inverse">
                        <img src="#" alt="MD-COMMERCE" class="c-mobile-logo"> </a>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
                    <button class="c-topbar-toggler" type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <button class="c-search-toggler" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <!-- END: BRAND -->
                <!-- BEGIN: QUICK SEARCH -->
                <form class="c-quick-search" action="#">
                    <input type="text" name="query" placeholder="Type to search..." value="" class="form-control" autocomplete="off">
                    <span class="c-theme-link">&times;</span>
                </form>
                <!-- END: QUICK SEARCH -->
                <!-- BEGIN: HOR NAV -->
                <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- BEGIN: MEGA MENU -->
                <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                    <ul class="nav navbar-nav c-theme-nav">
                        @if(count($menusHeader) > 0)
                        @foreach($menusHeader as $value)
                        <li class="c-menu-type-classic">
                            <a href="{{ $value->getSlug() }}" @if($value->type == 'external-link') target='_blank' @endif class="c-link @if(count($value->submenus) > 0) dropdown-toggle @endif">
                               {{ $value->title }}
                               @if(count($value->submenus) > 0)
                               <span class="c-arrow c-toggler"></span>
                                @endif
                            </a>
                            @if(count($value->submenus) > 0)
                            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                @foreach($value->submenus as $value)
                                <li class="dropdown-submenu">
                                    <a href="{{ $value->getSlug() }}" @if($value->type == 'external-link') target='_blank' @endif>
                                       {{ $value->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    @endif
                    <li class="c-search-toggler-wrapper">
                        <a href="#" class="c-btn-icon c-search-toggler">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: MEGA MENU -->
            <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
            <!-- END: HOR NAV -->
        </div>
    </div>
</div>
</header>
<!-- END: HEADER -->
