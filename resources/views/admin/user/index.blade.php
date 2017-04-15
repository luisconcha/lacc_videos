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

    <a href="{{route('admin.users.create')}}" class="btn btn-primary">New user</a>
    <table class="table">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>actions</td>
        </tr>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    ---
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="4"><span class="label label-warning">No record</span></td>
            </tr>
        @endforelse
    </table>

    {{(count($users) ? $users->links() : '')}}

@endsection