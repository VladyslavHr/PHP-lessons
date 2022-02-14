<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', 'string', 'min:3'],
            'content' => ['required'],
            'post_status' => ['required'],
            'postable_id' => '',
            'postable_type' => '',
            'allow_comments' => 'integer',
            'images.*' => 'image',
		];

		$validator = validator($request->all(), $rules);

		if($validator->fails()){
			return [
                'status' => 'error',
                'message' => implode('<br>', $validator->messages()->all())
            ];
		}

        $data = $validator->validated();

        $data = array_merge([
            'allow_comments' => '0',
            'author_id' => auth()->user()->id,
            // 'postable_id' => auth()->user()->id,
            // 'postable_type' => 'App\Models\Group',
            'comment_count' => '0',
        ], $data);


        if($request->hasfile('images'))
        {
            if (count($request->file('images')) > 8) {
                return redirect()->back()->withErrors('Максимум 8 изображений')->withInput($request->all);
                return [
                    'status' => 'error',
                    'message' => 'Максимум 8 изображений',
                ];
            }
            $pathes = [];
            foreach($request->file('images') as $key => $file)
            {

                $path = $file->store('post-images', 'public');
                $pathes[] = '/storage/'.$path;

                // $name = time().'-'.($key+1).'.'.$file->extension();
                // $file->move(public_path('pharmacy-images'), $name);

            }
            $data['images'] = implode(',', $pathes);
        }



        $post = Post::create($data);

        return [
            'status' => 'ok',
            'message' => 'Пост добавлен!'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
