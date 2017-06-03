@extends('admin.template.admin')

@section('title')
    Show User
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i>Users List</a></li>
            <li><a href="{{route('admin.users.show',$data->id)}}"><i class="fa fa-user"></i>User Detail</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container">
        <h2>View user: <strong>{{$data->name}}</strong></h2>

        @include('admin.errors._check')

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">Personal data</h3></div>
            <div class="panel-body">
                <div class="col-xs-12">
                    @if(isset($data->thumb))
                        <div class="thumbnail">
                            <img class="thumbnail" src="{{$data->thumb_asset}}"
                                 alt="{{$data->name}}">
                        </div>
                    @endif
                    <ul class="list-group text-left">
                        <li class="list-group-item"><b>Name:</b> {{$data->name}}</li>
                        <li class="list-group-item"><b>Email:</b> {{$data->email}}</li>
                    </ul>
                </div>

            </div>
        </div>
        {!! Form::model($data,['route'=>['admin.users.destroy',$data->id],'method'=>'delete']) !!}
        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-trash-o"></i> Delete user: '.$data->name, ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
            {!! Form::hidden('redirect_to', URL::previous()) !!}
            <a href="{{route('admin.users.edit',$data->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-pencil"></i> Alter user: {{$data->name}} </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-eye"></i> User list </a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection