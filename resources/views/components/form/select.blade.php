<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    {{ Form::select($name, $value , null, ['placeholder' => 'Pick a Category...','class' => 'form-control']) }}
</div>