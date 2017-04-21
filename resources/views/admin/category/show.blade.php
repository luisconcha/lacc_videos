@extends('admin.template.admin')

@section('title')
    Show Category
@endsection

@section('content')
    <div class="container">
        <h1>View category: <strong>{{$data->name}}</strong></h1>

        @include('admin.errors._check')

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">Category data</h3></div>

            <div class="panel-body">
                <div class="col-xs-12">
                    <ul class="list-group text-left">
                        <li class="list-group-item"><b>Name:</b> {{$data->name}}</li>
                        <li class="list-group-item"><b>Color:</b> <span
                                    style="background: {{$data->color}}">{{$data->color}}</span></li>
                    </ul>
                </div>

            </div>
        </div>
        {!! Form::model($data,['route'=>['admin.categories.destroy',$data->id],'method'=>'delete']) !!}
        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-trash-o"></i> Delete category: '.$data->name, ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
            {!! Form::hidden('redirect_to', URL::previous()) !!}
            <a href="{{route('admin.categories.edit',$data->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-pencil"></i> Alter
                category: {{$data->name}} </a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-eye"></i> Category list </a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection