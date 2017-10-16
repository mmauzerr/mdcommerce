<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    @yield('seo-title')

    @include('layouts.admin.partials.login-head')
    
</head>

<body>

    <div class="container">
        <div class="row">
            
            @yield('content')
            
        </div>
    </div>

    @include('layouts.admin.partials.login-footer')
    
</body>

</html>
