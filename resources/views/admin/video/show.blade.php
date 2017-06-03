@extends('admin.template.admin')

@section('title')
    Show Video
@endsection

@section('content')
    <div class="container">
        <h1>View category: <strong>{{$data->title}}</strong></h1>

        @include('admin.errors._check')

        <div class="panel panel-danger">
            <div class="panel-heading"><h3 class="panel-title">Video data</h3></div>

            <div class="panel-body">
                @if(isset($data->thumb))
                    <div class="thumbnail">
                        <img class="thumbnail" src="{{$data->thumb_assets}}"
                             alt="{{$data->title}}">
                    </div>
                @endif
                
                <div class="col-xs-12">
                    <ul class="list-group text-left">
                        <li class="list-group-item"><b>Name:</b> {{$data->title}}</li>
                        <li class="list-group-item"><b>Description:</b> {{$data->description}}</li>
                        <li class="list-group-item"><b>Duration:</b> {{$data->duration}}</li>
                    </ul>
                </div>

            </div>
        </div>
        {!! Form::model($data,['route'=>['admin.videos.destroy',$data->id],'method'=>'delete']) !!}
        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-trash-o"></i> Delete category: '.$data->title, ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
            {!! Form::hidden('redirect_to', URL::previous()) !!}
            <a href="{{route('admin.videos.edit',$data->id)}}" class="btn btn-primary btn-sm"> <i
                        class="fa fa-fw fa-pencil"></i> Alter
                category: {{$data->title}} </a>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-default btn-sm"><i
                        class="fa fa-fw fa-eye"></i> Video list </a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection