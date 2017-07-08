@extends('admin.template.admin')

@section('title')
    Video Module
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Video module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.videos.index') }}"><i class="fa fa-film"></i>List of Videos</a></li>
            <li><i class="fa fa-laptop"></i> Video module</li>
        </ol>
    </section>
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Duration','Duration', ['class' => 'control-label']) !!}
                                    {!! Form::number('duration', null, ['class'=>'form-control','id'=>'duration']) !!}
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
                    {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save Series and Categories', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                </div>
                {!! Form::close() !!}
            @endslot

            @slot('videoAndThumbnail')
                @if(!empty($data))
                    <h1>Video and Thumbnail:
                        <strong>{{$data->title}}</strong>
                    </h1>
                    {!! Form::model($data,['route'=>['admin.videos.video-thumbnail.create','id'=>$data->id],'method'=>'put', 'files'=> true]) !!}
                @endif

                <div class="panel panel-info">
                    <div class="panel-heading"><h3 class="panel-title">Files</h3></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Thumbnail','Thumbnail', ['class' => 'control-label']) !!}
                                    {!! Form::file('thumb', null, ['class'=>'form-control','id'=>'thumb']) !!}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('Video','Video', ['class' => 'control-label']) !!}
                                    {!! Form::file('file', null, ['class'=>'form-control','id'=>'file']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group text-center">
                    {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save video and thumbnail', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                </div>
                {!! Form::close() !!}
            @endslot


        @endcomponent

        <div class="text-right col-md-offset-2">
            <a href="{{ route('admin.videos.index') }}" class="btn btn-warning btn-sm"><i
                        class="fa fa-fw fa-rotate-left"></i> Return </a>
        </div>
    </div>

@endsection