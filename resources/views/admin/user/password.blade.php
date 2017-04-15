@extends('admin.template.admin')

@section('title')
    Password change
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i>Users List</a></li>
            <li><a href="{{route('admin.users.show',$user->id)}}"><i class="fa fa-user"></i>User</a></li>
            <li class="active">Change password</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>Password change user: {{$user->name}}</h3>

            @include('admin.errors._check')

            {!! Form::open(['route'=>'admin.users.password','role'=>'form','class'=>'form']) !!}


            <div class="panel panel-danger">
                <div class="panel-heading"><h3 class="panel-title">Security data</h3></div>
                <div class="panel-body">
                    <div class="form-group {{ $errors->first('password')? ' has-error':'' }}">
                        {!! Form::label('Password','Password', ['class' => 'control-label']) !!}
                        {!! Form::password('password', ['placeholder'=>'Inform your password','class'=>'form-control',
                        'id'=>'password'])
                         !!}
                    </div>
                    <div class="form-group {{ $errors->first('password_confirmation')? ' has-error':'' }}">
                        {!! Form::label('password-confirmation','Password Confirmation', ['class' => 'control-label']) !!}
                        {!! Form::password('password_confirmation', ['placeholder'=>'Confirm your password',
                        'class'=>'form-control','id'=>'password'])
                         !!}
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                {!! Form::submit('Save', ['class'=>'btn btn-primary btn-sm']) !!}
                <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-warning btn-sm"> View profile </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection