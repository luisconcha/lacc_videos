@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">User list</li>
        </ol>
    </section>
@endsection

@section('content')
    <h1>Userlist</h1>

    <a href="{{route('admin.users.new')}}" class="btn btn-primary">New user</a>
    <table class="table">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>actions</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    ---
                </td>
            </tr>
        @endforeach
    </table>

@endsection