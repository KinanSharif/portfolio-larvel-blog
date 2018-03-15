@extends('layouts.app')

@section('content')
    <h2>Blog {{$title}}</h2>

    <div class="panel-body">

        {!! Form::open(['action' => 'SettingsController@update', 'method' => 'POST']) !!}

        {{ Form::bsText('site_name',$setting->site_name) }}



        {{ Form::bsText('contact_number',$setting->contact_number) }}

        {{ Form::bsEmail('contact_email',$setting->contact_email) }}

        {{ Form::bsText('address',$setting->address) }}


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