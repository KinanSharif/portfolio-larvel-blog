@extends('layouts.app')

@section('content')
    <h2>create a new {{$title}}</h2>

    <div class="panel-body">

        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'files'=> true]) !!}

        {{ Form::bsText('title') }}


        {{ Form::bsTextArea('body') }}

        <br>

        <div class="form-check-inline">
            @foreach($tags as $tag)
                {!! Form::label('tag', $tag->tag, ['class' => 'form-check form-check-label']) !!}

                {{ Form::checkbox('tags[]',$tag->id,null,['class' => 'form-check-input','type'=>'checkbox','checked'=>true])}}
            @endforeach
        </div>

        <br><br>


        {{ Form::bsSelect('category_id',$categories) }}

        {{ Form::bsFile('featured') }}

        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}

    </div>

@stop

@section('styles')

    <link href="{{ asset('css/summernote/summernote-bs4.css') }}" rel="stylesheet">

    @stop

@section('scripts')

    <script src="{{ asset('js/summernote-bs4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#body').summernote();
        });

    </script>

    @stop