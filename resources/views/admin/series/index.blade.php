@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Series module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Series list</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="form-group col-xs-7 text-center">
            <h3>List of series</h3>
        </div>
        <div class="form-group col-xs-5 text-right">
            <h3><a href="{{route('admin.series.create')}}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> New
                    serie</a></h3>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $serie)
            <tr>
                <td>{{ $serie->id }}</td>
                <td>
                    <div class="media">
                        <img class="d-flex align-self-center mr-3 pull-left" src="{{$serie->thumb_small_asset}}"
                             alt="no image available">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $serie->title }}</h5>
                        </div>
                    </div>
                </td>
                <td>{{ $serie->description }}</td>
                <td>
                    <a href="{{route('admin.series.edit',$serie->id)}}" class="table-link">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="{{route('admin.series.show',$serie->id)}}" class="table-link text-danger">
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
        </tbody>

    </table>

    <div class="text-center">
        {{(count($data) ? $data->links() : '')}}
    </div>

@endsection

@push('styles')
<style type="text/css">
    table > thead > tr > th:nth-child(2) {
        width: 20%;
    }

    table > thead > tr > th:nth-child(4) {
        width: 10%;
    }
</style>
@endpush