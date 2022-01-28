<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
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

        $path = storage_path(str_replace('/storage/', '/app/public/', $old_image_url));
        if (file_exists($path)) {
            $deleted = unlink($path);
        }


        // delete old avatar

        return [
            'status' => $saved ? 'ok' : 'error',
            '$data' => $data,
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
    public function store(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|min:4|max:255',
            'secondname' => 'required|min:4|max:255',
            'date' => 'required',
            'city' => 'required|min:1|max:255',
            'birth-place' => 'required|min:1|max:255',
            'work' => 'required|min:4|max:255',
            'study' => 'required|min:4|max:255',
            'family-status' => 'required|min:4|max:255',
            'phone' => 'required|min:4|max:255',
            'email' => 'required|min:4|max:255',
            'avatar' => 'image',
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
        $users = User::all();
        return view('profiles.show', [
            'title' => 'My profile',
            'users' => $users,
            'user' => Auth::user()
        ]);
    }

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
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $data = $request->validate([
            'name' => 'required|min:4|max:255',
            'secondname' => 'required|min:4|max:255',
            'date' => 'required',
            'city' => 'required|min:1|max:255',
            'birth-place' => 'required|min:1|max:255',
            'work' => 'required|min:4|max:255',
            'study' => 'required|min:4|max:255',
            'family-status' => 'required|min:4|max:255',
            'phone' => 'required|min:4|max:255',
            'email' => 'required|min:4|max:255',
            'avatar' => 'image',
        ],[
            'name.required' => 'Введите имя',
            'email.required' => 'Введите электронную почту',
        ]);

        $saved = $user->update($data);

        return redirect()->back()->with('status', 'Информация обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
