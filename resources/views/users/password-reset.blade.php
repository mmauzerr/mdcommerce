@extends('layouts.admin.login-layout')

@section('seo-title')
<title> Password reset {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
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
            <h3 class="panel-title">Password reset</h3>
        </div>
        <div class="panel-body">
            
            @include('layouts.admin.partials.message')
            
            @if($tokenIsValid)
                <form role="form" action="" method="post">

                    {{ csrf_field() }}

                    <fieldset>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>New password: </label>
                                <input class="form-control" type="password" name="password" value="">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label>Confirm new password: </label>
                                <input class="form-control" type="password" name="password_confirmation" value="">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Save new password</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            @endif
            
        </div>
    </div>
</div>
@endsection