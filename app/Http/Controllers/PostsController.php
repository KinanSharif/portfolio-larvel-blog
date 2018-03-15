<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Auth;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'title' => 'Post',
            'posts' => Post::all(),
        ];

        return view('admin.posts.index')->with($data);


    }

    /**
     * Show the form for creating a new resource.
     * Important: select_category is a custom function
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Post';


        $categories = Category::all();

        $tags = Tag::all();

        if ($categories->count() == 0 || $tags->count() == 0) {

            return redirect()->back()->with('error', 'You must create atleast one category or Tag !');

        }


        $data = [
            'title' => 'Post',
            'categories' => $this->select_category($categories),
            'tags' => $tags
        ];

        return view('admin.posts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $this->validate($request, [
            'title' => 'required',
            'featured' => 'image',
            'body' => 'required',
            'category_id' => 'required',
        ]);


        // renaming the file image

        $featured_new_name = 'no_image.jpg';

        if ($request->featured) {

            $featured = $request->file('featured');

            $featured_new_name = time() . $request->file('featured')->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

        }


        // insert into db

        $post = Post::create([

            'title' => $request->title,

            'body' => $request->body,

            'featured' => 'uploads/posts/' . $featured_new_name,

            'category_id' => $request->category_id,

            'slug' => str_slug($request->title),

            'user_id' => Auth::id()

        ]);

        // pivot table between tags and posts
        $post->tags()->attach($request->tags);

        return redirect()->route('post.index')->with(['success' => 'Post created !']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $categories = Category::all();



        $data = [
            'title' => 'Post',
            'categories' => $this->select_category($categories),
            'post' => Post::find($id),
            'tags' => Tag::all()

        ];


        return view('admin.posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // validation
        $this->validate($request, [

            'title' => 'required',

            'featured' => 'image',

            'body' => 'required',

            'category_id' => 'required'

        ]);

        //finding the post to edit
        $post = Post::find($id);

        // check if image uploaded
        if($request->hasFile('featured'))
        {
            $featured = $request->file('featured');

            $featured_new_name = time() . $request->file('featured')->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;

        }

        // update the db
        $post->title = $request->title;

        $post->body = $request->body;

        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);


        return redirect()->route('post.index')->with(['success' => 'Post updated !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::onlyTrashed()->where('id',$id)->first();

        $post->forceDelete();

        return redirect()->back()->with('success', 'Post Destroyed');


    }

    public function trash($id){
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('success', 'Post Trashed');
    }

    public function trashed(){



        $data = [
            'title' => 'Post',
            'posts' => Post::onlyTrashed()->get()
        ];


        return view('admin.posts.trashed')->with($data);

    }

    public function restore($id){

        $post = Post::onlyTrashed()->where('id',$id)->first();

        $post->restore();

        return redirect()->back()->with('success', 'Post Restored');


    }




    // Custom functions
    //------------------------------------------------------------------------------------------------------------------
    /**
     * it creates an array from $categories objects into an array
     * for the select option category in the create post.
     *
     * @param  object $categories
     * @return array
     */

    protected function select_category($categories)
    {


        if (count($categories) > 0) {

            $selectCategories = array();

            foreach ($categories as $category) {

                $selectCategories[$category->id] = $category->name;
            }
        } else {

            return null;

        }

        return $selectCategories;

    }
}
