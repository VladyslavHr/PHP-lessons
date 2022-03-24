<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
use Illuminate\Support\Facades\Auth;

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
        $today_day = date("l");
        $date = date('j.n.Y');
        $day = date('j');
        $month = date('n');
        $names = Name::where('day', $day)->where('month', $month)->pluck('name')->toArray();
        $today_names = implode(', ', $names);
        return view('home',[
            'today_names' => $today_names,
            'date' => $date,
            'today_day' => $today_day,
        ]);
    }
}
