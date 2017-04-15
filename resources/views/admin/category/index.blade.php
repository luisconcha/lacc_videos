@extends('admin.template.admin')

@section('breadcrumbs')
    <section class="content-header">
        <h1>
            Category module
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li class="active">Category list</li>
        </ol>
    </section>
@endsection

@section('content')

    <div class="row">
        <div class="form-group col-xs-7 text-center">
            <h3>List of categories</h3>
        </div>
        <div class="form-group col-xs-5 text-right">
            <h3><a href="{{route('admin.categories.create')}}" class="btn btn-primary">New user</a></h3>
        </div>
    </div>
    <table class="table table-hover">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>Slug</td>
            <td>color</td>
            <td>actions</td>
        </tr>
        @forelse($data as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->url }}</td>
                <td>
                    <span class="label" style="background-color: {{ $category->color }}">{{ $category->color }}</span>
                </td>
                <td>
                    <a href="{{route('admin.categories.edit',$category->id)}}" class="table-link">
                        <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="{{route('admin.categories.show',$category->id)}}" class="table-link text-danger">
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