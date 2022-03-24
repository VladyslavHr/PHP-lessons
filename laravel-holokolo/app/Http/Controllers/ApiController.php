<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Name;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
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


        $names = Name::where('name', 'like', '%'.$query.'%')->limit(5)->get();


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
}
