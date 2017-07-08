@extends('admin.template.admin')

@section('title')
    New Plan
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Plan module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.plans.index') }}"><i class="fa fa-university"></i>List of plans</a></li>
            <li><i class="fa fa-university"></i>New category</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container col-md-offset-1 col-md-10">
        <div class="row">
            <h3>New Plan</h3>

            @include('admin.errors._check')
             
            {!! Form::open(['route'=>'admin.plans.store','role'=>'form','class'=>'form']) !!}

            @include('admin.plans._form')

            <div class="form-group text-center">
                {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                <a href="{{ route('admin.plans.index') }}" class="btn btn-warning btn-sm">
                    <i class="fa fa-fw fa-rotate-left"></i> Return </a>
            </div>
            
            {!! Form::close() !!}

        </div>
    </div>

@endsection