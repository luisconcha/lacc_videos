@extends('admin.template.admin')

@section('title')
    New Category
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Category</h3>

            @include('admin.errors._check')

            {!! Form::open(['route'=>'admin.categories.store','role'=>'form','class'=>'form']) !!}

            @include('admin.category._form')

            <div class="form-group text-center">
                {!! Form::submit('Save', ['class'=>'btn btn-primary btn-sm']) !!}
                <a href="{{ route('admin.categories.index') }}" class="btn btn-warning btn-sm"> Return </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection