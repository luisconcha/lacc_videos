@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="">User list</a></li>
            <li class="active">Add list</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="body">

        {!! Form::open(['route'=>'admin.users.store', 'method'=>'post']) !!}

        <div class="form-group {{ $errors->first('')? ' has-error':'' }}">
            {!! Form::label('name','Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['placeholder'=>'Informe o nome','class'=>'form-control', 'id'=>'name']) !!}
        </div>

        <div class="form-group {{ $errors->first('email')? ' has-error':'' }}">
            {!! Form::label('email','Email', ['class' => 'control-label']) !!}
            {!! Form::text('email', null, ['placeholder'=>'Informe o Email','class'=>'form-control', 'id'=>'email']) !!}
        </div>

        <div class="form-group text-center">
            {!! Form::submit('Save', ['class'=>'btn btn-primary btn-sm']) !!}
            <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-sm"> Return </a>
        </div>


        {!! Form::close() !!}
    </div>
@endsection
