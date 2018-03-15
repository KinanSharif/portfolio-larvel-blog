@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><h2>{{$title}} listing</h2></div>




        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>
                @if($categories->count()>0)
                    @foreach( $categories as $category )

                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                <a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-outline-info" role="button">Edit</a>
                            </td>
                            <td>


                                {!!Form::open(['action' => ['CategoriesController@destroy', $category->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}



                            </td>
                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No Categories</th>
                    </tr>
                @endif
                </tbody>

            </table>
        </div>

    </div>





@stop