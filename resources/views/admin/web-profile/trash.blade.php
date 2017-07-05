@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Paypal profile module trash
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.web_profile.index') }}"><i class="fa fa-film"></i>List of paypal profiles</a></li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="form-group col-xs-7 text-center">
                <h3>List of profiles that are in the trash</h3>
            </div>
        </div>
        <div class="row table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">Paypal profile description</th>
                    <th style="width: 7%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $profile)
                    <tr>
                        <td>{{ $profile->id }}</td>
                        <td>
                            <div class="media-body">
                                <h5 class="mt-0">{{ $profile->name }}</h5>
                            </div>
                        </td>
                        <td>
                            <a href="{{route('admin.trashed.category.restore',['id'=>$profile->id])}}"
                               class="btn btn-danger btn-outline btn-xs"
                               onclick="event.preventDefault();document.getElementById('restore-profile-{{ $profile->id }}').submit();">
                                <strong>Restore</strong>
                            </a>
                            {!! Form::open(['route' => ['admin.trashed.web_profile.restore', 'id' =>$profile->id],'method'=>'GET', 'id' => "restore-profile-$profile->id", 'style' => 'display:none']) !!}
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