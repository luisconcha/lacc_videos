@extends('admin.template.admin')

@section('title')
    New Category
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-university"></i>List of categories</a></li>
            <li><i class="fa fa-university"></i>New category</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Category</h3>

            @include('admin.errors._check')

            {!! Form::open(['route'=>'admin.categories.store','role'=>'form','class'=>'form']) !!}

            @include('admin.category._form')

            <div class="form-group text-center">
                {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                <a href="{{ route('admin.categories.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-rotate-left"></i> Return </a>
            </div>


            {!! Form::close() !!}

        </div>
    </div>

@endsection