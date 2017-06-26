@extends('admin.template.admin')

@section('title')
    Edit Plan
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Plan module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.plans.index') }}"><i class="fa fa-university"></i>List of plans</a>
            </li>
            <li><a href="{{route('admin.plans.show',$data->id)}}"><i class="fa fa-university"></i>Plan</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container col-md-offset-1 col-md-10">
        <h1>Edit plan:
            <strong>{{$data->name}}</strong>
        </h1>

        @include('admin.errors._check')

        {!! Form::model($data,['route'=>['admin.plans.update','id'=>$data->id],'method'=>'put']) !!}

        @include('admin.plans._form')

        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-pencil"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
            <a href="{{ route('admin.plans.index') }}" class="btn btn-warning btn-sm">
                <i class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection