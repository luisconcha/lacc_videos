@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
            <small>User list</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">User list</li>
        </ol>
    </section>
@endsection

@section('content')
    <h1>Userlist</h1>
@endsection