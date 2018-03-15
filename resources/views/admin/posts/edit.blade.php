@extends('layouts.app')

@section('content')




    <div class="card">

        <div class="card-header"><h2>create a new post</h2></div>


        <div class="card-body">

            {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'files'=> true]) !!}

            {{ Form::bsText('title', $post->title) }}

            {{ Form::bsTextArea('body', $post->body) }}

            <div class="form-check-inline">

                    @foreach($tags as $tag)
                    <label class="form-check-label">
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                    @foreach($post->tags as $t)
                        @if($tag->id == $t->id)
                            checked
                           @endif
                            @endforeach

                    >{{$tag->tag}}</label>
                @endforeach
            </div>


            {!! Form::select('category_id', $categories, $post->category_id,['class' => 'form-control']) !!}

            {{ Form::bsFile('featured') }}

            {{Form::hidden('_method','PUT')}}

            {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}

            {!! Form::close() !!}

        </div>
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