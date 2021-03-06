<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,Group};

class HomeController extends Controller
{
    public function test()
    {
        # code...
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     public function profile()
    {
        $users = User::all();
        return view('profile', [
            'title' => 'My profile',
            'users' => $users,
            'user' => Auth::user()
        ]);
    }

    public function groups()
    {
        $groups = Group::all();
        return view('groups',[
            'title' => 'groups',
            'groups' => $groups,
            'user' => Auth::user(),
        ]);
    }


}
