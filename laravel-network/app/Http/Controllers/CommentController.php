<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'post_id' => 'required',
			'text' => 'required|string|min:5|max:1000',
		];

		// $messages = [
		// 	'text.required' => 'Введіть імейл!',
		// 	'email.email' => 'Не валідний імейл!',
		// ];

		$validator = validator($request->all(), $rules);

		if($validator->fails()){
			return response()->json([
                'status' => 'error',
                'message' => implode('<br>', $validator->messages()->all()),
                'errors' => $validator->messages()->all(),
            ]);
		}

        $data = $validator->validated();

        $data['user_id'] = auth()->user()->id;

        $comment = Comment::create($data);

        $comments_count = Comment::where('post_id', $data['post_id'])->count();


        Post::where('id', $data['post_id'])->update(['comments_count' => $comments_count]);

        return [
            'status' => 'ok',
            'message' => 'Комментарий добавлен!',
            'comments_count' => $comments_count,
            'comment_block' => view('blocks.comment-block', [
                'comment' => $comment,
            ])->render(),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
