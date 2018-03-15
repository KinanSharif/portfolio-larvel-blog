<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class UsersController extends Controller
{


    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => User::all(),
        ];

        return view('admin.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'User',
        ];

        return view('admin.users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',

            'email' => 'required'

        ]);

        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => bcrypt('password')

        ]);

        $profile = Profile::create([

            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/no-image.png'

        ]);

        return redirect()->route('users.index')->with(['success' => 'User created !']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        return redirect()->back()->with('info','User deleted !');
    }

    public function admin($id){

        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        return redirect()->route('users.index')->with(['success' => 'User permission changed to admin !']);


    }

    public function not_admin($id){

        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        return redirect()->route('users.index')->with(['success' => 'User permission changed to not admin !']);


    }
}
