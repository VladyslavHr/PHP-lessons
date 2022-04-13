<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\{User, Group, Post};


class ProfileController extends Controller
{

    public function productCreate()
    {
       return view('profiles.product-create', [
           'user' => auth()->user(),
       ]);
    }

    public function shop()
    {

        $products = [1,11,111,111,1.1,1,1,1,111];


        return view('profiles.shop',[
            'products' => $products,
            'user' => auth()->user(),
        ]);
    }

    public function product()
    {

        $products = [1,11,111,111,1.1,1,1,1,111];
        return view('profiles.product', [
            'products' => $products,
            'user' => auth()->user(),
        ]);
    }

    public function friends()
    {

        // $mutual = $user->getIsFriendAttribut();




        $friends = auth()->user()->friends();

        // $users = User::whereIn('id', function($query)
        // {
        //     $query->select('users.id')
        //     ->from('users')->where([
        //         'friend_user_id' => auth()->user()->id,
        //     ])->join('followers', 'followers.current_user_id', '=', 'users.id')->get();
        // })->whereIn('id', function($query)
        // {
        //     $query->select('users.id')
        //     ->from('users')->where([
        //         'current_user_id' => auth()->user()->id,
        //     ])->join('followers', 'followers.friend_user_id', '=', 'users.id')->get();
        // })
        // ->get();


        return view('profiles.friends', [
            'users' => $friends,
            'user' => Auth::user(),
        ]);
    }

    public function followers()
    {
        $users = User::all();


        // $current_user_id = auth()->user()->id;
        // $friend_user_id = Db::table('followers')
        //     ->where(['friend_user_id' => 'id'])->join('users', 'followers.friend_user_id', '=', 'users.id')->get();


        //     dd($friend_user_id);


        $followers = auth()->user()->followers();
            // $followers = [];
            // foreach ($users as $key => $user) {
            //     if ($friend_user_id && $current_user_id === $current_user_id) {
            //         $followers[] = $user;
            //     }
            // }
            // dd($followers);



        return view('profiles.friends', [
            'users' => $followers,
            'user' => Auth::user(),
        ]);
    }

    public function following()
    {
        // $users = User::all();

        // $following = [];
        // foreach ($users as $key => $user) {
        //     if ($user->getIsFriendAttribute()) {
        //         $following[] = $user;
        //     }
        // }

        $following = auth()->user()->followings();

        return view('profiles.friends', [
            'users' => $following,
            'user' => Auth::user(),
        ]);
    }

    public function search(Request $request)
    {
       $query = trim($request->get('query'));

        if($query) {
            $users = User::where('name', 'LIKE', '%'.$query.'%')
                ->orWhere('last_name', 'LIKE', '%'.$query.'%')
                ->orWhere('email', 'LIKE', '%'.$query.'%')
                ->get();
            if($users){
                $count = count($users);
                $message = "Search for <b>\"$query\"</b>- ". $count ." ".s_ending($count, 'user', 'users'). " was found";
            }
        }else{
            $users = [];
            $message = 'Wrong search query';
        }

        return view('pages.search', [
            'search_type' => 'users',
            'results' => $users,
            'message' => $message,
            'user' => auth()->user(),
        ]);
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
            $path = $request->file('avatar')->store('user-avatars', 'public');
            $data['avatar'] = '/storage/'.$path;
        }else{
            $data['avatar'] = '//via.placeholder.com/500x500';
        }

        $user = User::find($request->get('id'));
        $old_image_url = $user->avatar;
        $saved = $user->update($data);

        // $user->avatar = $data['avatar'];
        // $saved = $user->save();

        // Storage::delete(public_path('/storage/', '/app/public/', $old_image_url));
        $path = public_path($old_image_url);
        if (file_exists($path)) {
            $deleted = unlink($path);
        }


        // delete old avatar

        return [
            'status' => $saved ? 'ok' : 'error',
            'data' => $data,
            '$path' => $path,
            '$old_image_url' => $old_image_url
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
        //
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

    public function changeBanner(Request $request)
    {

        $request->validate([
            'banner' => 'required|dimensions:min_width=100,min_height=100|mimes:jpg'
        ]);

        if ($request->hasFile('banner')) {
            $request->file('banner')->move(public_path('images'), 'profile-banner.jpg');
        }


        return redirect()->back()->with('status', 'Баннер обнавлен');
    }



    public function store(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255',
            'secondname' => 'required|min:4|max:255',
            'date' => 'required',
            'city' => 'required|min:1|max:255',
            'birth_place' => 'required|min:1|max:255',
            'work' => 'required|min:4|max:255',
            'study' => 'required|min:4|max:255',
            'family_status' => 'required|min:4|max:255',
            'phone' => 'required|min:4|max:255',
            'email' => 'required|min:4|max:255',
            'avatar' => 'image',
            'about_yourself' => '',
        ],[
            'name.required' => 'Введите имя',
            'email.required' => 'Введите электронную почту',
        ]);
        // dd($data['name']);

        // if ($request->hasFile('avatar')) {
        //     $path = $request->file('avatar')->store('group-avatars', 'public');
        //     $data['avatar'] = '/storage/'.$path;
        // }else{
        //     $data['avatar'] = '//via.placeholder.com/600x150';
        // }

        // $group = new Group($data);
        $saved = $user->save();

        // if($saved) return redirect()->back()->with('status', 'Группа добавлена!');
        // else return redirect()->back()->with('status', 'Группа НЕ добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        $user = Auth::user();
        $friends = auth()->user()->friends();
        return view('profiles.show', [
            'title' => 'My profile',
            'friends' => $friends,
            'user' => Auth::user(),
            'postable_id' => $user->id,
            'postable_type' => 'App\Models\User',
        ]);
    }


    public function show(User $user)
    {

        // $user = Auth::user();
        $friends = auth()->user()->friends();
        return view('profiles.show', [
            'title' => 'Profile',
            'friends' => $friends,
            'user' => $user,
            'postable_id' => $user->id,
            'postable_type' => 'App\Models\User',
        ]);
    }


    // public function friends()
    // {
    //     $users = User::all();
    //     return view('profiles.friends', [
    //         'title' => 'friends',
    //         'users' => $users,
    //         'user' => Auth::user(),
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $users = User::all();
        return view('profiles.edit', [
            'title' => 'My profile edit',
            'users' => $users,
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate([
            'name' => 'required|min:4|max:255',
            'last_name' => 'max:255',
            'birth_date' => 'date|nullable',
            'city' => 'max:255',
            'birth_city' => 'max:255',
            'work' => 'max:255',
            'study' => 'max:255',
            'family_status' => 'max:255',
            'phone' => 'max:255',
            'email' => 'required|min:4|max:191',
            'about_yourself' => '',
        ],[
            'name.required' => 'Введите имя',
            'email.required' => 'Введите электронную почту',
        ]);
        // dd($data);

        $user = Auth::user();
        $user->update($data);

        return redirect()->back()->with('status', 'Информация обновлена!');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $data['password'] = bcrypt($data['password']);
        // dd($data);
        Auth::user()->update($data);

        return redirect()->back()->with('status', 'Информация обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // delete post img
        $posts = Post::where('author_id', $user->id)->get();
        foreach ($posts as $key => $post) {
            if ($post->images) {
                $images = explode(',', $post->images);
                foreach ($images as $image) {
                    $path = public_path($image);
                    if (file_exists($path)) { unlink($path); }
                }
            }

        }

        // delete avatar file
        $path = public_path($user->avatar);
            if (file_exists($path) && strpos($user->avatar, '/images/') === false) { unlink($path); }

        $user->delete();

        $groups = Group::whereNull('creator_id')->update([
            'creator_id' => '1',
        ]);

        auth()->logout();
        return redirect()->route('login');
    }

    public function follow(Request $request)
    {
        $friend_user_id = (int)$request->get('friend_user_id');

        if (!$friend_user_id || !auth()->user()) {
            return [
                'status' => 'error',
                'message' => 'Wrong data',
            ];
        }

        $current_user_id = auth()->user()->id;

        // $is_friends = Db::table('followers')
        //     ->where('current_user_id', $current_user_id)
        //     ->where('friend_user_id', $friend_user_id)
        //     ->first();


            Db::table('followers')->insert([
                'current_user_id' => $current_user_id,
                'friend_user_id' => $friend_user_id,
            ]);


        return [
            'status' => 'ok',
            'new_href' => route('profiles.unfollow'),
            'new_text' => 'Отписаться',
            'posts_html' => '',
        ];
    }

    public function unfollow(Request $request)
    {
        $friend_user_id = (int)$request->get('friend_user_id');

        if (!$friend_user_id || !auth()->user()) {
            return [
                'status' => 'error',
                'message' => 'Wrong data',
            ];
        }

        $current_user_id = auth()->user()->id;

        // $is_friends = Db::table('followers')
        //     ->where('current_user_id', $current_user_id)
        //     ->where('friend_user_id', $friend_user_id)
        //     ->first();

            Db::table('followers')
                ->where('current_user_id', $current_user_id)
                ->where('friend_user_id', $friend_user_id)
                ->delete();

            return [
                'status' => 'ok',
                'new_href' => route('profiles.follow'),
                'new_text' => 'Подписаться'
            ];
    }
}
