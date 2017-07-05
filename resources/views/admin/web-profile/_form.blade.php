{!! Form::hidden('redirect_to', URL::previous()) !!}

<div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title">profile data</h3></div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('name')? ' has-error':'' }}">
                    {!! Form::label('name','Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['placeholder'=>'Inform profile name','class'=>'form-control', 'id'=>'name']) !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{ $errors->first('logo_url')? ' has-error':'' }}">
                    {!! Form::label('logo_url','Url logo', ['class' => 'control-label']) !!}
                    {!! Form::text('logo_url', null, ['placeholder'=>'Inform profile logo_url','class'=>'form-control', 'id'=>'name']) !!}
                </div>
            </div>
        </div>
    </div>
</div>