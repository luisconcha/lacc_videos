@extends('admin.template.admin')

@section('title')
    Video Module
@endsection

@section('content')
    <div class="container col-md-12">

        @component('admin.video.tabs-component',['data' => $data])

        @slot('information')
        @if(empty($data))
            <h3>New Video</h3>
            {!! Form::open(['route'=>'admin.videos.store','role'=>'form','class'=>'form']) !!}
        @else
            <h1>Edit video:
                <strong>{{$data->title}}</strong>
            </h1>
            {!! Form::model($data,['route'=>['admin.videos.update','id'=>$data->id],'method'=>'put']) !!}
        @endif

        {!! Form::hidden('redirect_to', URL::previous()) !!}
        
        <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title">Information data</h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->first('name')? ' has-error':'' }}">
                            {!! Form::label('title','Title', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['placeholder'=>'Inform video title','class'=>'form-control', 'id'=>'name']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->first('email')? ' has-error':'' }}">
                            {!! Form::label('Description','Description', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description', null, ['placeholder'=>'Inform the description','class'=>'form-control',
                            'id'=>'email']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
            <a href="{{ route('admin.videos.index') }}" class="btn btn-warning btn-sm"><i
                        class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>

        {!! Form::close() !!}
        @endslot

        @slot('seriesAndCategory')
        <h1>Content Series and category</h1>
        @endslot

        @slot('videoAndThumbnail')
        <h1>Content Video and Thumbnail</h1>
        @endslot

        @endcomponent
    </div>

@endsection