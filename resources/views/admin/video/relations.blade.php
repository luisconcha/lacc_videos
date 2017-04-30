@extends('admin.template.admin')

@section('title')
    New Video Relations
@endsection

@section('content')

    <div class="container col-md-12">
        @component('admin.video.tabs-component',['data' => $data->getModel()])

        @if( !isset($data) )
            <h3>New Relations</h3>
            {!! Form::open(['route'=>'admin.videos.relations.create','role'=>'form','class'=>'form']) !!}
        @else
            <h1>Edit relations video:
                <strong>{{$data->title}}</strong>
            </h1>
            {!! Form::model($data,['route'=>['admin.videos.update','id'=>$data->id],'method'=>'put']) !!}
        @endif

        <h3>New Relations</h3>

        {!! Form::open(['route'=>['admin.videos.relations.create','video'=>$data->id],'role'=>'form','class'=>'form']) !!}

        <h1>Relations</h1>

        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-edit"></i> Edit', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
            <a href="{{ route('admin.videos.index') }}" class="btn btn-warning btn-sm"><i
                        class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>

        {!! Form::close() !!}
        @endcomponent
    </div>

@endsection