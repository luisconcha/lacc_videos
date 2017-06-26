@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Plans module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Plans list</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="form-group col-xs-7 text-center">
            <h3>List of plans</h3>
        </div>
        <div class="form-group col-xs-5 text-right">
            <h3><a href="{{route('admin.plans.create')}}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> New
                    plan</a></h3>
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <td>id</td>
            <td>Name</td>
            <td>Description</td>
            <td class="td-width-5">Value($)</td>
            <td class="td-width-5">Duration</td>
            <td class="td-width-5">Actions</td>
        </tr>

        @forelse($data as $plans)
            <tr>
                <td>{{ $plans->id }}</td>
                <td>{{ $plans->name}}</td>
                <td>{{ $plans->description}}</td>
                <td>$ {{ $plans->value }}</td>
                <td>{{ ($plans->duration == 1)? 'Yearly':'Monthly' }}</td>
                <td>
                    <a href="{{route('admin.plans.edit',$plans->id)}}" class="table-link" id="update-{{ $plans->id }}">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="{{route('admin.plans.show',$plans->id)}}" class="table-link text-danger"
                       id="delete-{{ $plans->id }}">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="6"><span class="label label-warning">No record</span></td>
            </tr>
        @endforelse
    </table>

    <div class="text-center">
        {{(count($data) ? $data->links() : '')}}
    </div>

@endsection