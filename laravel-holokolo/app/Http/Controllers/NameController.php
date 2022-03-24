<?php

namespace App\Http\Controllers;

use App\Models\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function search(Request $request)
    {
        $query =  $request->get('query');

        if (!trim($query)) {
            return [
                'status' => 'error',
            ];
        }

        // Вернуть запрос
        // DB::enableQueryLog();
        // $search_list_html = '';


        $names = NAme::where('name', 'like', '%'.$query.'%')->limit(5)->get();


        // $users = User::where('role', '=', 'user')
        //     ->where(function($db) use ($query)
        //     {
        //         $db->where('name', 'like', '%'.$query.'%');
        //         $db->orwhere('name', 'like', '%'.$query.'%');
        //     })->limit(5)->get();

        //     if(count($users)){
        //         $search_list_html .= '<li class="search-autocomplete-title"><small>users</small></li>';
        //     }
            // foreach ($names as $name) {
                // $name = $user->name.' '.$user->last_name;
            //     $search_list_html .= '<li class="result-item"><a href="/profile/'.$name->id.'">'.$name.'</a></li>';
            // }

        return  [
            'status' => 'ok',
            'names' => $names,
            'search_list_html' => view('blocks.search-list',[
                'names' => $names,
            ])->render(),
        ];

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $month_eng = [
        //     'January',
        //     'February ',
        //     'March ',
        //     'April',
        //     'May',
        //     'June ',
        //     'July ',
        //     'August',
        //     'September',
        //     'October',
        //     'November',
        //     'December',
        // ];


        // $names = Name::all();

        //     $array = [];
        //     foreach ($names as $key => $name){
        //         $array[] = $name;
        //     }

        $results = Name::all();

        // $arr1 = [];
        // foreach ($results as $name => $result){
        //     // dd($name);
        //     $arr1[] = $result->day;

        // }
        // dd($arr1);

        // $today_names = implode(', ', $names);


        return view('names.index', [
            // 'today_names' => $today_names,
            // 'array' => $array,
            'results' => $results,
            // 'month_eng' => $month_eng,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Name $name)
    {
        // $day = date('j');
        // $month = date('n');
        // $names = Name::where('day', $day)->where('month', $month)->pluck('name')->toArray();
        // $today_names = implode(', ', $names);
        return  view('names.show',[
            // 'today_names' => $today_names,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function edit(Name $name)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Name $name)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(Name $name)
    {
        //
    }
}
