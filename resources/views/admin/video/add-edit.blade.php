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
                    {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save information data', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                </div>
                {!! Form::close() !!}
            @endslot

            @slot('seriesAndCategory')
                @if(!empty($data))
                    <h1>Edit series and categories:
                        <strong>{{$data->title}}</strong>
                    </h1>
                    {!! Form::model($data,['route'=>['admin.videos.video-series-categories','id'=>$data->id],'method'=>'put']) !!}
                @endif

                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="panel-title">Series and Categories</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->first('serie_id')? ' has-error':'' }}">
                                    <div class="form-group">
                                        {!! Form::label('series','Series', ['class' => 'control-label']) !!}
                                        {!! Form::select('serie_id', $categories,null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->first('categories')? ' has-error':'' }}">
                                    <div class="form-group">
                                        {!! Form::label('category','Category', ['class' => 'control-label']) !!}
                                        {!! Form::select('categories[]', $categories,null, ['class'=>'form-control', 'multiple' => true]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                </div>
                {!! Form::close() !!}
            @endslot

            @slot('videoAndThumbnail')
                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="panel-title">Files</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('image','Thumbnail', ['class' => 'control-label']) !!}
                                    {!! Form::file('image', null, ['class'=>'form-control','id'=>'image']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('image','Video', ['class' => 'control-label']) !!}
                                    {!! Form::file('image', null, ['class'=>'form-control','id'=>'image']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endslot


        @endcomponent

        <div class="text-right col-md-offset-2">
            <a href="{{ route('admin.videos.index') }}" class="btn btn-warning btn-sm"><i
                        class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>
    </div>

@endsection