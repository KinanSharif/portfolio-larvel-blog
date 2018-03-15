<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
use App\Tag;



class FrontEndController extends Controller
{

    public function index(){



        /*
        |   The naming convention is according to the layout page
        */

        $data = [

            'title' => Setting::first()->site_name,

            'settings' => Setting::first(),

            'categories' => Category::take(5)->get(),

            'first_post' => Post::latest()->first(),

            'second_post' => Post::latest()->skip(1)->take(1)->get()->first(),

            'third_post' => Post::latest()->skip(2)->take(1)->get()->first(),

            'first_category' => Category::latest()->first(),

            'second_category' => Category::latest()->skip(1)->take(1)->first(),

            'third_category' => Category::latest()->skip(2)->take(2)->first(),

        ];

        /*
        |   last 3 posts of the respective category.
        */

        $categories_with_posts = [

            'first_category_posts' => $data['first_category']->posts()->latest()->take(3)->get(),

            'second_category_posts' => $data['second_category']->posts()->latest()->take(3)->get(),

            'third_category_posts' => $data['third_category']->posts()->latest()->take(3)->get()

        ];


        return view('index')->with($data)->with($categories_with_posts);
    }



    public function single_post($slug){

        $data = [

            'settings' => Setting::first(),

            'post' => Post::where('slug', $slug)->first(),

            'categories'=> Category::take(5)->get(),

            'tags' => Tag::all()




        ];


        /*
        |   getting the id's of next and prev post for pagination link.
        */

            $next_post_id = Post::where('id','>', $data['post']->id)->min('id');

            $prev_post_id = Post::where('id','<', $data['post']->id)->max('id');

            $pagination=[

                'next' => Post::find($next_post_id),

                'prev' => Post::find($prev_post_id)

                ];


        return view('single')->with($data)->with(['title' => $data['post']->title])->with($pagination);
    }


    public function category($id){


        $category = Category::find($id);

        $data = [

            'title' => $category->name,

            'settings' => Setting::first(),

            'category' => $category,

            'categories'=> Category::take(5)->get(),

        ];

        return view('category')->with($data);

    }

    public function tag($id){

        $tag = Tag::find($id);

        $data = [

            'title' => $tag->tag,

            'tag' => $tag,

            'settings' => Setting::first(),

            'categories'=> Category::take(5)->get(),


        ];

        return view('tag')->with($data);
    }

}




/* $categories = Category::with(['posts' => function ($q) {
     $q->orderBy('id', 'desc')->limit(4);
 }])->get();*/


/*  $categories = Category::with('latest3Posts')->get();
  dd($categories);*/



/*'title' => Setting::first()->site_name,

            'categories' => Category::take(5)->get(),

            'first_post' => Post::orderBy('created_at', 'desc')->first(),

            'second_post' => Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first(),

            'third_post' => Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first(),

            'first_category' => Category::orderBy('created_at','desc')->first(),

            'second_category' => Category::orderBy('created_at','desc')->skip(1)->take(1)->first(),*/


/*$categories_with_posts = [

    'first_category_posts' => $data['first_category']->posts()->latest()->take(3)->get(),

    'second_category_posts' => $data['second_category']->posts()->latest()->take(3)->get(),

    'third_category_posts' => $data['third_category']->posts()->latest()->take(3)->get()

];*/