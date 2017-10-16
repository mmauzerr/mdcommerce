@extends('layouts.admin.login-layout')

@section('seo-title')
<title> Password recovery {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection


@section('content')

<style>
    .g-recaptcha > div{
        margin: 0 auto;
    }
</style>

<div class="col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Password recovery</h3>
        </div>
        <div class="panel-body">
            
            @include('layouts.admin.partials.message')
            
            <form role="form" action="" method="post">
                
                {{ csrf_field() }}
                
                <fieldset>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input value='{{ old('email') }}' class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                        
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        {!! Recaptcha::render() !!}
                        
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <button class="btn btn-lg btn-success btn-block">Send email</button>
                    <a style="margin-top: 20px;" class="btn btn-link pull-right" href="{{ route('login') }}">Login</a>
                </fieldset>
            </form>
        </div>
    </div>
    </div>
@endsection