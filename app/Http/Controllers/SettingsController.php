<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(){

        $data = [
            'title' => 'Settings',
            'setting' => Setting::first(),
        ];

        return view('admin.settings.settings')->with($data);
    }


    public function update(){

        $this->validate(request(), [

            'site_name' => 'required',

            'contact_number' => 'required',

            'contact_email' => 'required',

            'address' => 'required',

        ]);


        $settings = Setting::first();

        $settings->site_name = request()->site_name;

        $settings->address = request()->address;

        $settings->contact_number = request()->contact_number;

        $settings->contact_email = request()->contact_email;


        $settings->save();

        return redirect()->back()->with('success', 'Settings saved !');

    }
}
