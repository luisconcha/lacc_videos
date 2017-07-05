@extends('admin.template.admin')

@section('title')
    New Paypal profile
@endsection

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Paypal profile module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.web_profile.index') }}"><i class="fa fa-university"></i>List of paypal profiles</a></li>
            <li><i class="fa fa-university"></i>New Paypal profile</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Paypal profile</h3>

            @include('admin.errors._check')

            {!! Form::open(['route'=>'admin.web_profile.store','role'=>'form','class'=>'form']) !!}

            @include('admin.web-profile._form')

            <div class="form-group text-center">
                {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                <a href="{{ route('admin.web_profile.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-rotate-left"></i> Return </a>
            </div>
            
            {!! Form::close() !!}

        </div>
    </div>

@endsection