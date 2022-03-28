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

        $names = Name::where('name', 'like', '%'.$query.'%')->limit(5)->get();


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

        // $names = Name::all();

        //     $array = [];
        //     foreach ($names as $key => $name){
        //         $array[] = $name;
        //     }

        $results = Name::all();

        foreach ($results as $res){
            $monthNum  = date('F', mktime(0, 0, 0, $res->month, 10));;

        }
        // $res_names = implode(', ', $results);
        dd($monthNum);


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
            'monthNum' => $monthNum,
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



    public function result(Request $request)
    {

        $query =  $request->get('query');

        $names = Name::where('name', 'like', '%'.$query.'%')->limit(50)->get();


        return  view('names.result',[
            'names' => $names,
        ]);
    }


    public function show(Name $name)
    {


        $monthName = date('F', mktime(0, 0, 0, $name->month, 10)); // March

        return view('names.show', [
            'name' => $name,
            'monthName' => $monthName,
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
