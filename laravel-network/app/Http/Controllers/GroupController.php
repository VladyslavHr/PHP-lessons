<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index',[
            'title' => 'groups',
            'groups' => $groups,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = $request->validate([
            'name' => 'required|min:4|max:255',
            'description' => 'required|min:4|max:255',
        ],[
            'name.required' => 'Введите имя группы',
            'description.required' => 'Введите описание',
        ]);
        // dd($data['name']);

        if($request->hasFile('avatar'))
        {
            $path = $request->file('avatar')->store('group-avatars', 'public');
            $data['avatar'] = 'storage/' .$path;
        }else{
            $data['avatar'] = '//via.placeholder.com/600x150';
        }
        // $path = $request->file('avatar')->store('group-avatars');


        dd($path);




        // $res = Group::create($data);

        // dd($res);

        $group = new Group($data);
        $save = $group->save();

        if($save) return redirect()->back()->with('status', 'Группа добавлена!');
        else return redirect()->back()->with('status', 'Группа Не добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('groups.show', [
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
