@extends('admin.template.admin')

@section('title')
    Edit Category
@endsection

@section('content')
    <div class="container">
        <h1>Edit category:
            <strong>{{$data->name}}</strong>, color:
            <span style="background: {{$data->color}}">{{$data->color}}</span>
        </h1>

        @include('admin.errors._check')

        {!! Form::model($data,['route'=>['admin.categories.update','id'=>$data->id],'method'=>'put']) !!}

        @include('admin.category._form')

        <div class="form-group text-center">
            {!! Form::submit('Edit', ['class'=>'btn btn-primary btn-sm']) !!}
            <a href="{{ route('admin.categories.index') }}" class="btn btn-warning btn-sm"> Return </a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection