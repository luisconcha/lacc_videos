@extends('admin.template.admin')

@section('title')
    Edit Paypal profile
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Paypal profile module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.web_profile.index') }}"><i class="fa fa-university"></i>List of paypal profiles</a></li>
            <li><a href="{{route('admin.web_profile.show',$data->id)}}"><i class="fa fa-university"></i>Profile</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container">
        <h1>Edit category:
            <strong>{{$data->name}}</strong>
        </h1>

        @include('admin.errors._check')

        {!! Form::model($data,['route'=>['admin.web_profile.update','id'=>$data->id],'method'=>'put']) !!}

        @include('admin.web-profile._form')

        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-pencil"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
            <a href="{{ route('admin.web_profile.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection