@extends('admin.template.admin')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="container">
        <h1>Edit user: <strong>{{$data->name}}</strong></h1>

        @include('admin.errors._check')

        {!! Form::model($data,['route'=>['admin.users.update','id'=>$data->id],'method'=>'put', 'files'=>true]) !!}

        @include('admin.user._form')

        <div class="form-group text-center">
            {!! Form::submit('Edit', ['class'=>'btn btn-primary btn-sm']) !!}
            <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-sm"> Return </a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection