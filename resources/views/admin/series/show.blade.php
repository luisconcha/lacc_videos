@extends('admin.template.admin')

@section('title')
    Show Series
@endsection

@section('content')
    <div class="container">
        <h1>View series: <strong>{{$data->title}}</strong></h1>

        @include('admin.errors._check')

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">Series data</h3></div>

            <div class="panel-body">
                <div class="col-xs-12">
                    <ul class="list-group text-left">
                        <li class="list-group-item"><b>Name:</b> {{$data->title}}</li>
                        <li class="list-group-item"><b>Description:</b><br>{{$data->description}}</li>
                    </ul>
                </div>

            </div>
        </div>
        {!! Form::model($data,['route'=>['admin.series.destroy',$data->id],'method'=>'delete']) !!}
        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-trash-o"></i> Delete series: '.$data->title, ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
            {!! Form::hidden('redirect_to', URL::previous()) !!}
            <a href="{{route('admin.series.edit',$data->id)}}" class="btn btn-primary btn-sm"> <i class="fa fa-fw fa-pencil"></i> Alter
                series: {{$data->title}} </a>
            <a href="{{ route('admin.series.index') }}" class="btn btn-default btn-sm"><i class="fa fa-fw fa-eye"></i> Series list </a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection