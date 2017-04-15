{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title">Category data</h3></div>
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
                    {!! Form::label('Color','Color', ['class' => 'control-label']) !!}
                    {!! Form::color('color', null, ['placeholder'=>'Inform the color','class'=>'form-control',
                    'id'=>'email']) !!}
                </div>
            </div>
        </div>
    </div>
</div>