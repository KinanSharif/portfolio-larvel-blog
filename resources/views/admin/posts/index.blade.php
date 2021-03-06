@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><h2>{{$title}} listing</h2></div>




        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @if($posts->count() > 0)
                    @foreach( $posts as $post )

                        <tr>
                            <td>
                                <img src="{{$post->featured}}" alt="img-fluid" class="img-thumbnail" style="width: 60%;height: 80px;">

                            </td>

                            <td>
                                {{$post->title}}
                            </td>

                            <td>
                                <a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-outline-info" role="button">Edit</a>
                            </td>
                            <td>


                                {!!Form::open(['action' => ['PostsController@trash', $post->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                                {{Form::hidden('_method', 'PATCH')}}
                                {{Form::bsSubmit('Trash', ['class' => 'btn btn-secondary'])}}
                                {!! Form::close() !!}



                            </td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No Posts</th>
                    </tr>
                @endif
                </tbody>

            </table>
        </div>

    </div>





@stop