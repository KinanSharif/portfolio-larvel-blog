@extends('layouts.app')

@section('content')




    <h2>create a new {{$title}}</h2>


    <div class="panel-body">





        {!! Form::open(['action' => 'UsersController@store', 'method' => 'POST']) !!}

        {{ Form::bsText('name') }}

        {{ Form::bsEmail('email') }}


        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}



    </div>

@stop