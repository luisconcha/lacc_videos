@extends('admin.template.admin')

@section('title')
    Show User
@endsection

@section('content')
    <div class="container">
        <h1>View user: <strong>{{$data->name}}</strong></h1>

        @include('admin.errors._check')

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">Personal data</h3></div>
            <div class="panel-body">
                <div class="col-xs-12">
                    @if(isset($data->image))
                        <div class="thumbnail">
                            <img class="thumbnail" src="{{env('APP_URL') . '/assets/uploads/users/'.$data->image }}"
                                 alt="">
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
            {!! Form::submit("Delete user: $data->name", ['class'=>'btn btn-danger btn-sm']) !!}
            {!! Form::hidden('redirect_to', URL::previous()) !!}
            <a href="{{route('admin.users.edit',$data->id)}}" class="btn btn-primary btn-sm"> Alter user {{$data->name}} </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-default btn-sm"> Users list </a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection