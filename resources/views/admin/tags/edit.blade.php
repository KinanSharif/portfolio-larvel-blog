@extends('layouts.app')

@section('content')





    <h2>Edit Category: {{$tag->tag}}</h2>


    <div class="panel-body">





        {!! Form::open(['action' => ['TagsController@update', $tag->id], 'method' => 'POST']) !!}



        {{ Form::bsText('tag',$tag->tag) }}

        {{Form::hidden('_method','PUT')}}

        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}



    </div>

@stop