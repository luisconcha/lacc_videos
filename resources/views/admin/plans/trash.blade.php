@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Plan module trash
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.plans.index') }}"><i class="fa fa-film"></i>List of plans</a></li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row col-md-offset-1 col-md-10">
        <div class="row">
            <div class="form-group col-xs-7 text-center">
                <h3>List of plans that are in the trash</h3>
            </div>
        </div>
        <div class="row table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date the record was deleted</th>
                    <th class="td-width-5">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $plan)
                    <tr>
                        <td>{{ $plan->id }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>{!! dateHoraMinuteBR($plan->deleted_at) !!}</td>
                        <td>
                            <a href="{{route('admin.trashed.plans.restore',['id'=>$plan->id])}}"
                               class="btn btn-danger btn-outline btn-xs"
                               onclick="event.preventDefault();document.getElementById('restore-plans-{{ $plan->id }}').submit();">
                                <strong>Restore</strong>
                            </a>
                            {!! Form::open(['route' => ['admin.trashed.plans.restore', 'id' =>$plan->id],'method'=>'GET', 'id' => "restore-plans-$plan->id", 'style' => 'display:none']) !!}
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