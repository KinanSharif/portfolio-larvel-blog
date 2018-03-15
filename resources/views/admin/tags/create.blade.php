@extends('layouts.app')

@section('content')




    <h2>create a new {{$title}}</h2>

    
    <div class="panel-body">





            {!! Form::open(['action' => 'TagsController@store', 'method' => 'POST']) !!}

            {{ Form::bsText('tag') }}


            {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}



    </div>

    @stop