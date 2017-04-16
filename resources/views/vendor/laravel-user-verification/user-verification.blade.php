@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ config('app.name')  }} - {!! trans('laravel-user-verification::user-verification.verification_error_header') !!}</div>
                <div class="panel-body">
                    <span class="help-block">
                        <strong>{!! trans('laravel-user-verification::user-verification.verification_error_message') !!}</strong>
                    </span>
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{route('admin.login')}}" class="btn btn-primary">
                                Login to the system
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
