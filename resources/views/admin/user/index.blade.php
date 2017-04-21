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

    <div class="row">
        <div class="form-group col-xs-7 text-center">
            <h3>List of users</h3>
        </div>
        <div class="form-group col-xs-5 text-right">
            <h3><a href="{{route('admin.users.create')}}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> New user</a></h3>
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>actions</td>
        </tr>
        @forelse($data as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{route('admin.users.edit',$user->id)}}" class="table-link">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="{{route('admin.users.show',$user->id)}}" class="table-link text-danger">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="4"><span class="label label-warning">No record</span></td>
            </tr>
        @endforelse
    </table>

    <div class="text-center">
        {{(count($data) ? $data->links() : '')}}
    </div>

@endsection