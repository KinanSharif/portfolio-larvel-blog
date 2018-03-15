

<div class="form-group">
    {{ Form::label($name, null, []) }}
    {{ Form::password($name, array_merge(['class' => 'form-control'], $attributes)) }}
</div>