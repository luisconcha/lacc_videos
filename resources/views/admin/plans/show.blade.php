@extends('admin.template.admin')

@section('title')
    Show Plan
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Plan module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.plans.index') }}"><i class="fa fa-university"></i>List of plans</a></li>
            <li><a href="{{route('admin.plans.show',$data->id)}}"><i class="fa fa-university"></i>Plan</a></li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container col-md-offset-1 col-md-10">
        <h2>View plan: <strong>{{$data->name}}</strong></h2>

        @include('admin.errors._check')

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">Plan data</h3></div>

            <div class="panel-body">
                <div class="col-xs-12">
                    <ul class="list-group text-left">
                        <li class="list-group-item"><b>Name:</b> {{$data->name}}</li>
                        <li class="list-group-item"><b>Description:</b> {{$data->description}}</li>
                        <li class="list-group-item"><b>Value:</b> $ {{$data->value}}</li>
                        <li class="list-group-item"><b>Duration:</b> {{ ($data->duration == 1)? 'Yearly':'Monthly' }}
                        </li>
                        <li class="list-group-item"><b>Creation date:</b> {!! dateHoraMinuteBR($data->created_at)!!}
                        <li class="list-group-item"><b>Update date:</b> {!! dateHoraMinuteBR($data->update_at)!!}
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        {!! Form::model($data,['route'=>['admin.plans.destroy',$data->id],'method'=>'delete']) !!}
        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-trash-o"></i> Delete plan ', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
            {!! Form::hidden('redirect_to', URL::previous()) !!}
            <a href="{{route('admin.plans.edit',$data->id)}}" class="btn btn-primary btn-sm">
                <i class="fa fa-fw fa-pencil"></i>
                Alter plan: {{$data->name}} </a>
            <a href="{{ route('admin.plans.index') }}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-eye"></i>
                Plan list </a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection