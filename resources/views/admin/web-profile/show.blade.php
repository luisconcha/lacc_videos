@extends('admin.template.admin')

@section('title')
    Show Paypal profile
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
        <h2>View profile: <strong>{{$data->name}}</strong></h2>

        @include('admin.errors._check')

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">Profile data</h3></div>

            <div class="panel-body">
                <div class="col-xs-12">
                    @if(isset($data->logo_url))
                        <div class="thumbnail">
                            <img class="thumbnail" src="{{$data->logo_url}}"
                                 alt="{{$data->name}}">
                        </div>
                    @endif
                    <ul class="list-group text-left">
                        <li class="list-group-item"><b>Name:</b> {{$data->name}}</li>
                    </ul>
                </div>

            </div>
        </div>
        {!! Form::model($data,['route'=>['admin.web_profile.destroy',$data->id],'method'=>'delete']) !!}
        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-trash-o"></i> Delete profile ', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
            {!! Form::hidden('redirect_to', URL::previous()) !!}
            <a href="{{route('admin.web_profile.edit',$data->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-pencil"></i> Alter
                profile: {{$data->name}} </a>
            <a href="{{ route('admin.web_profile.index') }}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-eye"></i> Paypal profile list </a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection