@extends('admin.template.admin')

@section('title')
    New User
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>New User</h3>

            @include('admin.errors._check')

            {!! Form::open(['route'=>'admin.users.store','files'=>true,'role'=>'form','class'=>'form']) !!}

            @include('admin.user._form')

            <div class="form-group text-center">
                {!! Form::submit('Save', ['class'=>'btn btn-primary btn-sm']) !!}
                <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-sm"> Return </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection