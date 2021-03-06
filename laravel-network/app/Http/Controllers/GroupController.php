<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
// use App\Models\Group;
// use App\Models\User;
use App\Models\{Group,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function subscribedGroups(Request $request)
    {
        $users = User::all();
        // $groups = Group::find($request->get('group_id'));
        // $subscribes = Db::table('subscribers')->where([
        //     'user_id' => auth()->user()->id,
        // ])->join('groups', 'subscribers.group_id', '=', 'groups.id')->get();


        $subscribes = auth()->user()->subscribes(['creator', 'posts']);

        // dd($subscribes);


        // if ($groups->is_subscribed()) {
        //     Db::table('subscribers')->select([
        //         'user_id' => auth()->user()->id,
        //         'group_id' => $request->get('group_id'),
        //     ]);
        // }

        // $groups->is_subscribed();

        // $groups = Group::all();

        // $subscribes = $groups->filter(fn($group) => $group->is_subscribed());

        // $subscribes = [];
        // foreach ($groups as $key => $group) {
        //     if ($group->is_subscribed()) {
        //         $subscribes[] = $group;
        //     }
        // }


        // if( $group->is_subscribed()){
        //     Db::table('subscribers')
        //     ->where('user_id', auth()->user()->id)
        //     ->where('group_id', $group->id);
        // };
        return view('groups.subscribed-groups',[
            'user' => Auth::user(),
            'users' => $users,
            'groups' => $subscribes,
        ]);
    }


    public function subscribe(Request $request)
    {

        $group = Group::find($request->get('group_id'));

        if (!$group) {
            return [
                'status' => 'error',
            ];
        }
        if ($group->is_subscribed()) {
            Db::table('subscribers')
            ->where('user_id', auth()->user()->id)
            ->where('group_id', $group->id)
            ->delete();
            $button_text = 'Subscribe';
        }else{
            Db::table('subscribers')->insert([
                'user_id' => auth()->user()->id,
                'group_id' => $request->get('group_id'),
            ]);
            $button_text = 'Unsubscribe';
        }

        return [
            'status' => 'ok',
            '$request' => $request->all(),
            'user' => auth()->user(),
            'button_text' => $button_text
        ];
    }

    public function search(Request $request)
    {
       $query = trim($request->get('query'));

        if($query) {
            $groups = Group::where('name', 'LIKE', '%'.$query.'%')->get();
            if($groups){
                $count = count($groups);
                $message = "Search for <b>\"$query\"</b>- ". $count ." ".s_ending($count, 'group', 'groups'). " was found";
            }
        }else{
            $groups = [];
            $message = 'Wrong search query';
        }

        return view('pages.search', [
            'search_type' => 'groups',
            'results' => $groups,
            'message' => $message,
            'user' => auth()->user(),
        ]);
    }

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
            'data' => $data,
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
        $users = User::all();
        return view('groups.index', [
            'title' => 'groups',
            'user' => Auth::user(),
            'groups' => Group::all(),
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $group = new Group();
        $group->form_action = 'groups.store';
        $group->avatar = '';
        return view('groups.create', [
            'group' => $group,
            'user' => Auth::user(),
            'users' => $users,
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
            'name.required' => '?????????????? ?????? ????????????',
            'description.required' => '?????????????? ???????????????? ????????????',
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

        if($saved) return redirect()->back()->with('status', '???????????? ??????????????????!');
        else return redirect()->back()->with('status', '???????????? ???? ??????????????????!');
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
        $users = User::all();
        $group->form_action = 'groups.update';
        return view('groups.create', [
            'group' => $group,
            'user' => Auth::user(),
            'users' => $users,
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
            'name.required' => '?????????????? ?????? ????????????',
            'description.required' => '?????????????? ???????????????? ????????????',
        ]);
        // dd($data['name']);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('group-avatars', 'public');
            $data['avatar'] = '/storage/'.$path;
        }

        $saved = $group->update($data);

        return redirect()->back()->with('status', '???????????? ??????????????????!');
        // else return redirect()->back()->with('status', '???????????? ???? ??????????????????!');
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
