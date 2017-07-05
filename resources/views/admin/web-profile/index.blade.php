@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Paypal webProfile module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Paypal web profile list</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="form-group col-xs-7 text-center">
            <h3>List of paypal Profile</h3>
        </div>
        <div class="form-group col-xs-5 text-right">
            <h3><a href="{{route('admin.web_profile.create')}}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> New profile</a></h3>
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>logo</td>
            <td>Create in</td>
            <td>actions</td>
        </tr>
        @forelse($data as $profile)
            <tr>
                <td>{{ $profile->id }}</td>
                <td>{{ $profile->name }}</td>
                <td><img src="{{ $profile->logo_url }}" class="img-circle img-responsive"></td>
                <td>{{ dateHoraMinuteBR($profile->created_at) }}</td>
                <td>
                    <a href="{{route('admin.web_profile.edit',$profile->id)}}" class="table-link" id="update-{{ $profile->id }}">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="{{route('admin.web_profile.show',$profile->id)}}" class="table-link text-danger" id="delete-{{ $profile->id }}">
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