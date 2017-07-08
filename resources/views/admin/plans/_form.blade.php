{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title">Plan data</h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('duration')? ' has-error':'' }}">
                    <div class="form-group">
                        {!! Form::label('duration','Duration', ['class' => 'control-label']) !!}
                        {!! Form::select('duration', $durations,null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('name')? ' has-error':'' }}">
                    {!! Form::label('name','Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['placeholder'=>'Inform plan name','class'=>'form-control', 'id'=>'name']) !!}
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
                <div class="form-group {{ $errors->first('value')? ' has-error':'' }}">
                    {!! Form::label('value','Value', ['class' => 'control-label']) !!}
                    {!! Form::text('value', null, ['placeholder'=>'Inform plan value','class'=>'form-control', 'id'=>'value']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('paypal_web_profile_id')? ' has-error':'' }}">
                    <div class="form-group">
                        {!! Form::label('paypal_web_profile_id','Paypal web profile', ['class' => 'control-label']) !!}
                        {!! Form::select('paypal_web_profile_id', $webProfiles,null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>