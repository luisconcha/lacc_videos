{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title">Personal data</h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('name')? ' has-error':'' }}">
                    {!! Form::label('name','Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['placeholder'=>'Inform user name','class'=>'form-control', 'id'=>'name']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('email')? ' has-error':'' }}">
                    {!! Form::label('Email','Email', ['class' => 'control-label']) !!}
                    {!! Form::text('email', null, ['placeholder'=>'Inform your email','class'=>'form-control',
                    'id'=>'email']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('Thumbnail','Thumbnail', ['class' => 'control-label']) !!}
                    {!! Form::file('thumb_file', null, ['class'=>'form-control','id'=>'thumb_file']) !!}
                </div>
            </div>
        </div>
    </div>
</div>