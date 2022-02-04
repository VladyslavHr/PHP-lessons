<?php

namespace App\Http\Controllers;

// use App\Models\Group;
// use App\Models\User;
use App\Models\{Group,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadAvatar(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'id' => 'required',
            'avatar' => 'image:jpg,jpeg,png',
        ]);
        // dd($data['name']);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('group-avatars', 'public');
            $data['avatar'] = '/storage/'.$path;
        }else{
            $data['avatar'] = '//via.placeholder.com/600x150';
        }

        $group = Group::find($request->get('id'));
        $old_image_url = $group->avatar;
        $saved = $group->update($data);

        $path = storage_path(str_replace('/storage/', '/app/public/', $old_image_url));
        if (file_exists($path)) {
            $deleted = unlink($path);
        }

        // delete old avatar

        return [
            'status' => $saved ? 'ok' : 'error',
            // '$path' => $path,
            // 'deleted' => $deleted ? 'deleted' : 'error',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groups.index', [
            'title' => 'groups',
            'user' => Auth::user(),
            'groups' => Group::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = new Group();
        $group->form_action = 'groups.store';
        $group->avatar = '';
        return view('groups.create', [
            'group' => $group,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate([
            'name' => 'required|min:4|max:255',
            'description' => 'required|min:4|max:255',
            'avatar' => 'image',
        ],[
            'name.required' => 'Введите имя группы',
            'description.required' => 'Введите описание группы',
        ]);
        // dd($data['name']);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('group-avatars', 'public');
            $data['avatar'] = '/storage/'.$path;
        }else{
            $data['avatar'] = '//via.placeholder.com/600x150';
        }

        $group = new Group($data);
        $saved = $group->save();

        if($saved) return redirect()->back()->with('status', 'Группа добавлена!');
        else return redirect()->back()->with('status', 'Группа НЕ добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $users = User::all();
        return view('groups.show', [
            'group' => $group,
            'users' => $users,
            'user' => Auth::user(),
            'postable_id' => $group->id,
            'postable_type' => 'App\Models\Group',
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
        // dd($group);
        $group->form_action = 'groups.update';
        return view('groups.create', [
            'group' => $group,
        ]);
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
        $data = $request->all();
        $data = $request->validate([
            'name' => 'required|min:4|max:255',
            'description' => 'required|min:4|max:255',
            'avatar' => 'image',
        ],[
            'name.required' => 'Введите имя группы',
            'description.required' => 'Введите описание группы',
        ]);
        // dd($data['name']);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('group-avatars', 'public');
            $data['avatar'] = '/storage/'.$path;
        }

        $saved = $group->update($data);

        return redirect()->back()->with('status', 'Группа обновлена!');
        // else return redirect()->back()->with('status', 'Группа НЕ добавлена!');
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
