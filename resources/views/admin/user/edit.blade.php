@extends('admin.template.admin')

@section('title')
    Edit User
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i>Users List</a></li>
            <li><a href="{{route('admin.users.show',$data->id)}}"><i class="fa fa-user"></i>User</a></li>
        </ol>
    </section>
@endsection


@section('content')
    <div class="container">
        <h2>Edit user: <strong>{{$data->name}}</strong></h2>

        @include('admin.errors._check')

        {!! Form::model($data,['route'=>['admin.users.update','id'=>$data->id],'method'=>'put', 'files'=>true]) !!}

        @include('admin.user._form')

        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-pencil"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
            <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection