@extends('layouts.admin.layout')

@section('seo-title')
<title> Edit user {{ $user->name }} {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit admin user - {{ $user->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>* Name: </label>
                            <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>* Email: </label>
                            <input class="form-control" type="text" name="email" value="{{ $user->email }}" disabled>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label>Address: </label>
                            <input class="form-control" type="text" name="address" value="{{ old('address', $user->address) }}">
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label>Phone: </label>
                            <input class="form-control" type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- select for roles -->
                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label>Choose uer role: </label>
                            <select class="form-control" name="role">
                                <option value=''>-- Choose role --</option>
                                <option value="{{ \App\User::ROLE_ADMINISTRATOR }}" @if(old('role', $user->role) == \App\User::ROLE_ADMINISTRATOR) selected  @endif>{{ ucfirst(\App\User::ROLE_ADMINISTRATOR) }}</option>
                                <option value="{{ \App\User::ROLE_MODERATOR }}" @if(old('role', $user->role) == \App\User::ROLE_MODERATOR) selected  @endif>{{ ucfirst(\App\User::ROLE_MODERATOR) }}</option>
                            </select>
                            
                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection