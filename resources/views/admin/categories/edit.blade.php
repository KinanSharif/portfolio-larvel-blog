@extends('layouts.app')

@section('content')





    <h2>Edit Category: {{$category->name}}</h2>


    <div class="panel-body">





        {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST']) !!}



        {{ Form::bsText('name',$category->name) }}

        {{Form::hidden('_method','PUT')}}

        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}



    </div>

@stop