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
            {!!  Form::button('<i class="fa fa-fw fa-pencil"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
            <a href="{{ route('admin.categories.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection