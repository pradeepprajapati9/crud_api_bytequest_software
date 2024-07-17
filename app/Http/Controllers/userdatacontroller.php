<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class userdatacontroller extends Controller
{
    public function store(Request $req)
    {
        $data = $req->validate([
            "name" => "required",
            "phone_number" => "required",
            "email" => "required",
            "password" => "required",
            "images" => "required|mimes:png,jpg,jpeg|max:3000",
        ]);

        $data = new User;
        $data->name = $req->name;
        $data->phone_number = $req->phone_number;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        // $data->images = $req->file('images')->store('storephoto', 'public');
        // $data->images = $req->file('images')->store('storephoto', 'local');
        $file=$req->file('images');
        $filename=time().'_'. $file->getClientOriginalName();
        $data->images=$req->images->storeAs('storephoto',$filename,'public');
        $data->save();

        // $data = User::create($data);
        if ($data) {
            return redirect("login")->with('status', 'file uploaded and registration successfuly');
        }
    }

    public function checkUser(Request $req)
    {
        $data = $req->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (Auth::attempt($data)) {
            return Redirect::to('dashboard');
        } else {
            return redirect('login');
        }
    }

    public function dashboardpage()
    {
        $userdata=User::all();
        if (Auth::check()) {
            return view('pages.dashboard',compact('userdata'));
        } else {
            return view('pages.login');
        }
    }

    public function logoutUser()
    {
        Auth::logout();
        return view('pages.login');
    }
}
