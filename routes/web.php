<?php

/*
|   index page
*/

Route::get('/', [

    'uses' => 'FrontEndController@index',

    'as' => 'index'
]);

/*
 |   single page
 */

Route::get('/post/{slug}', [

    'uses' => 'FrontEndController@single_post',

    'as' => 'post.single'
]);

/*
 |   category listing
 */

Route::get('/category/{id}', [

    'uses' => 'FrontEndController@category',

    'as' => 'category.single'

]);

/*
|   tag listing
*/

Route::get('/tag/{id}', [

    'uses' => 'FrontEndController@tag',

    'as' => 'tag.single'

]);

/*
|   Searching query, closure method.
*/

Route::get('/results', function(){

    $data = [

        'title' => 'Search Results : '. request('query'),

        'result' => \App\Post::where('title','like', '%'. request('query').'%')->get(),

        'settings' => \App\Setting::first(),

        'categories' => \App\Category::take(5)->get(),

        'query' => request('query')

        ];

    return view('results')->with($data);

});


Auth::routes();


/*
|   permissions for admin
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');


    /*
    |   Trashing and storing of posts
    */

    Route::get('/post/trashed', [
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'
    ]);

    Route::patch('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::patch('/posts/trash/{id}', [
        'uses' => 'PostsController@trash',
        'as' => 'post.restore'
    ]);

    /*
    |   User Permissions
    */

    Route::get('/user/admin/{id}', [
        'uses' => 'usersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [
        'uses' => 'usersController@not_admin',
        'as' => 'user.not.admin'
    ]);


    /*
    |   User profile routes
    */


    Route::get('/user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::delete('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    /*
    |   Settings routes
    */

    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update', [

        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);


    Route::resource('users', 'UsersController');

    Route::resource('post', 'PostsController');

    Route::resource('tag', 'TagsController');

    Route::resource('category', 'CategoriesController');


});



