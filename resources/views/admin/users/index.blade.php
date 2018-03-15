@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><h2>{{$title}} listing</h2></div>




        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @foreach( $users as $user )

                        <tr>
                        
                            <td>
                                <img src="{{asset($user->profile->avatar)}}" alt="user image" width="60px" height="60px" style="border-radius:50%;">
                            </td>

                            <td>
                                {{$user->name}}
                            </td>

                            <td>
                                @if($user->admin)
                                    <a href="{{route('user.not.admin',['id' => $user->id])}}" class="btn btn-xs btn-outline-info">Undo Admin</a>
                                    @else
                                    <a href="{{route('user.admin',['id' => $user->id])}}" class="btn btn-xs btn-info">Make Admin</a>
                                    @endif

                            </td>

                            <td>

                                @if(Auth::id() !== $user->id)
                                    {!!Form::open(['action' => ['ProfilesController@destroy', $user->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                    @endif




                            </td>
                            
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No Users</th>
                    </tr>
                @endif
                </tbody>

            </table>
        </div>

    </div>





@stop