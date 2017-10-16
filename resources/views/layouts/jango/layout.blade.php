<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    
    @include('layouts.jango.partials.head')
    
    <body class="c-layout-header-fixed c-layout-header-mobile-fixed">
        
        @include('layouts.jango.partials.header')

        @yield('content')
        
        @include('layouts.jango.partials.footer')
        
        @yield('custom-js')
        
    </body>
</html>