<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, User, Group};
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
        DB::enableQueryLog();
        $search_list_html = '';


        $users = User::where('role', '=', 'user')
            ->where(function($db) use ($query)
            {
                $db->where('name', 'like', '%'.$query.'%');
                $db->orwhere('name', 'like', '%'.$query.'%');
            })->limit(5)->get();

            if(count($users)){
                $search_list_html .= '<li class="search-autocomplete-title"><small>users</small></li>';
            }
            foreach ($users as $user) {
                $name = $user->name.' '.$user->last_name;
                $search_list_html .= '<li class="result-item"><a href="/profile/'.$user->id.'">'.$name.'</a></li>';
            }


        $groups = Group::where('name', 'like', '%'.$query.'%')->limit(5)->get();

        if(count($groups)){
            $search_list_html .= '<li class="search-autocomplete-title"><small>groups</small></li>';
        }
        foreach ($groups as $group) {
            $search_list_html .= '<li class="result-item" title="'.$group->name.'"><a href="/groups/'.$group->id.'">'.$group->name.'</a></li>';
        }

        if ($search_list_html) {
            $search_list_html .= '<li class="result-item more-results" title=" More Results "><a href="/profiles/search?query='.$query.'">More Results</a></li>';
        }

        return  [
            'status' => 'ok',
            'users' => $users,
            'sql' => DB::getQueryLog(),
            'results_count' => count($users) + count($groups) + 1,
            'search_list_html' => $search_list_html,
        ];
    }
}
