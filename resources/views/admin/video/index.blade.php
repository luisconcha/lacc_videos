@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Video module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-film"></i>Videos List</a></li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="row">
            <div class="form-group col-xs-7 text-center">
                <h3>List of videos</h3>
            </div>
            <div class="form-group col-xs-5 text-right">
                <h3><a href="{{route('admin.videos.create')}}" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> New
                        video</a></h3>
            </div>
        </div>
        <div class="row table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">Video description</th>
                    <th style="width: 5%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>
                            <div class="media">
                                <img class="d-flex align-self-center mr-3 pull-left" src="{{url('img/img_64x64.png')}}"
                                     alt="no image available">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $video->title }}</h5>
                                    <p>{{ $video->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{route('admin.videos.edit',$video->id)}}" class="table-link">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                            </a>
                            <a href="{{route('admin.videos.show',$video->id)}}" class="table-link text-danger">
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
        </div>

        <div class="text-center">
            {{(count($data) ? $data->links() : '')}}
        </div>
    </div>

@endsection