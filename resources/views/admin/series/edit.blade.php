@extends('admin.template.admin')

@section('title')
    Edit Series
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.series.index') }}"><i class="fa fa-laptop"></i>List of series</a></li>
            <li><a href="{{route('admin.series.show',$data->id)}}"><i class="fa fa-laptop"></i>Edit series</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container">
        <h2>Edit series:
            <strong>{{$data->title}}</strong></span>
        </h2>

        @include('admin.errors._check')

        {!! Form::model($data,['route'=>['admin.series.update','id'=>$data->id],'method'=>'put','files'=>true]) !!}

        @include('admin.series._form')

        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-pencil"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
            <a href="{{ route('admin.series.index') }}" class="btn btn-warning btn-sm"><i
                        class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection