@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            User module trash
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-film"></i>List of users</a></li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="form-group col-xs-7 text-center">
                <h3>List of users that are in the trash</h3>
            </div>
        </div>
        <div class="row table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">User description</th>
                    <th class="text-center">Email</th>
                    <th style="width: 7%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="media-body">
                                <h5 class="mt-0">{{ $user->name }}</h5>
                                <h5 class="mt-0">{{ $user->email }}</h5>
                            </div>
                        </td>
                        <td>
                            <a href="{{route('admin.trashed.users.restore',['id'=>$user->id])}}"
                               class="btn btn-danger btn-outline btn-xs"
                               onclick="event.preventDefault();document.getElementById('restore-user-{{ $user->id }}').submit();">
                                <strong>Restore</strong>
                            </a>
                            {!! Form::open(['route' => ['admin.trashed.users.restore', 'id' =>$user->id],'method'=>'GET', 'id' => "restore-user-$user->id", 'style' => 'display:none']) !!}
                            {!! Form::hidden('_token', csrf_token()) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4"><span class="label label-warning">No record</span></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-center">
            {{(count($data) ? $data->links() : '')}}
        </div>
    </div>

@endsection