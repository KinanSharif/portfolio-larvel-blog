@extends('layouts.app')

@section('content')




    <h2>Update Profile</h2>


    <div class="panel-body">


        {!! Form::open(['action' => 'ProfilesController@update', 'method' => 'POST','files'=> true]) !!}

        {{ Form::bsText('name',$user->name) }}

        {{ Form::bsEmail('email',$user->email) }}

        {{ Form::bsPassword('new_password') }}

        {{ Form::bsFile('avatar') }}

        {{ Form::bsTextArea('about',$user->profile->about) }}

        {{ Form::bsText('facebook',$user->profile->facebook) }}

        {{ Form::bsText('youtube',$user->profile->youtube) }}

        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}



    </div>

@stop