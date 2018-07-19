<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Post;
use App\Comment;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $user = $this->user();

        $posts = Post::forUser($user->id)
                ->withCount('comments')
                ->with(['category'])
                ->get();

        $posts = Post::paginate(5);

        return view('posts.post-index', compact('posts', 'user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // view the create form

        $user = Auth::user();

        $create = true;


        return view('posts.post-form', compact('create', 'user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // do an actual post, redirect to post detail
        dd($request);

        $this->validate($request, [
            'title' => 'required|min:2',
            'body' => 'required|min:10',
        ]);

        return redirect()->route('posts.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show post detail with comments

        $user = Auth::user();

        $post = Post::findOrFail($id);

        $comments = $post->comments()
                         ->with(['user', 'category'])
                         ->get();

        $comments = Comment::paginate(10);

        return view('posts.post-detail', compact('post', 'user', 'comments'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // view the edit form
        $user = Auth::user();

        $post = Post::findOrFail($id);

        $create = false;

        return view('posts.post-form', compact('user', 'post', 'create'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // do actual update, redirect back to post detail
        
        $this->validate($request, [
            'title' => 'required|min:2',
            'body' => 'required|min:10',
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Auth::user();
        $post = Post::findOrFail($id);

        if($user->id !== $post->user_id){
            abort(400, 'You are not the owner of this post.');
        }

        $post->delete();

        // delete the post, redirect back to index
        return redirect()->route('posts.index');
    }
}
