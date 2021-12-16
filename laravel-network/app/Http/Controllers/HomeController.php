<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
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
        $users = User::all();
        // $groups = Groups::all();
        return view('groups',[
            'title' => 'groups',
            'groups' => '$groups',
            'users' => $users,
        ]);
    }

    public function friends()
    {
        $users = User::all();
        return view('friends', [
            'title' => 'friends',
            'users' => $users,
            'user' => Auth::user(),
        ]);
    }
}
