@extends('admin.template.admin')

@section('title')
    New Series
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>New Series</h3>

            @include('admin.errors._check')

            {!! Form::open(['route'=>'admin.series.store','role'=>'form','class'=>'form','files'=>true]) !!}

            @include('admin.series._form')

            <div class="form-group text-center">
                {!!  Form::button('<i class="fa fa-fw fa-save"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm'] ) !!}
                <a href="{{ route('admin.series.index') }}" class="btn btn-warning btn-sm"><i
                            class="fa fa-fw fa-rotate-left"></i> Return </a>
            </div>


            {!! Form::close() !!}

        </div>
    </div>

@endsection