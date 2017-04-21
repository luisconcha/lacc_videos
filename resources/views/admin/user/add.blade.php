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
                {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                <a href="{{ route('admin.users.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-rotate-left"></i> Return </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection