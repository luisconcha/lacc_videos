{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title">Information data</h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('name')? ' has-error':'' }}">
                    {!! Form::label('title','Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['placeholder'=>'Inform video title','class'=>'form-control', 'id'=>'name']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('email')? ' has-error':'' }}">
                    {!! Form::label('Description','Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', null, ['placeholder'=>'Inform the description','class'=>'form-control',
                    'id'=>'email']) !!}
                </div>
            </div>
        </div>
    </div>
</div>