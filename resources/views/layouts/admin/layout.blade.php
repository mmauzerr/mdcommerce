<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    @yield('seo-title')
    
    @include('layouts.admin.partials.head')
    
</head>

<body>

    <div id="wrapper">
            
        @include('layouts.admin.partials.nav')        

        <!-- Page Content -->
        <div id="page-wrapper">
            
            @yield('content')
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    @include('layouts.admin.partials.footer')
    
</body>

</html>
