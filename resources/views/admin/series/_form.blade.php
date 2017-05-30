{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title">Series data</h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('title')? ' has-error':'' }}">
                    {!! Form::label('title','Name', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['placeholder'=>'Inform series title','class'=>'form-control', 'id'=>'title']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('description')? ' has-error':'' }}">
                    {!! Form::label('Description','Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', null, ['placeholder'=>'Inform the description','class'=>'form-control',
                    'id'=>'description']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('thumb_file')? ' has-error':'' }}">
                    {!! Form::label('Thumbnail','Thumbnail', ['class' => 'control-label']) !!}
                    {!! Form::file('thumb_file', null, ['class'=>'form-control',
                    'id'=>'thumb_file']) !!}
                </div>
            </div>
        </div>
    </div>
</div>