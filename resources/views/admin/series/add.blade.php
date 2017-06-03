@extends('admin.template.admin')

@section('title')
    New Series
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.series.index') }}"><i class="fa fa-laptop"></i>List of series</a></li>
            <li><i class="fa fa-laptop"></i> New series</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Series</h3>

            @include('admin.errors._check')

            {!! Form::open(['route'=>'admin.series.store','role'=>'form','class'=>'form','files'=>true]) !!}

            @include('admin.series._form')

            <div class="form-group text-center">
                {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                <a href="{{ route('admin.series.index') }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-fw fa-rotate-left"></i> Return </a>
            </div>


            {!! Form::close() !!}

        </div>
    </div>

@endsection