<?php

namespace App\Http\Controllers;

use Auth;

use App\Category;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $user = $this->user();

        $categories = Category::all();

        return view('categories.category-index', compact('categories', 'user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // view the create form

        $user = $this->user();

        $create = true;

        $categories = Category::all();


        return view('posts.post-form', compact('create', 'user', 'categories'));

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

        $this->validate($request, [
            'title' => 'required|min:2',
            'body' => 'required|min:10',
        ]);

        $user = $this->user();

        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category;
        $post->user_id = $user->id;

        $post->save();

        return redirect()->route('categories.index');

        
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

        $category = Category::findOrFail($id);

        $posts = $category->posts()
                          ->with(['user'])
                          ->withCount('comments')
                          ->get();

        $posts = Post::paginate(10);

        return view('categories.category-detail', compact('category', 'user', 'posts'));

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

        $category = Category::findOrFail($id);

        $create = false;

        return view('categories.category-form', compact('user', 'category', 'create'));

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

        
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);
        
        $post->title = $request->title;
        $post->body = $request->body;

        $post->update();


        return redirect()->route('categories.index');
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
        $category = Category::findOrFail($id);

        $this->authorize('delete', $category);

        // if($user->id !== $post->user_id){
        //     abort(400, 'You are not the owner of this post.');
        // }

        $category->delete();

        // delete the post, redirect back to index
        return redirect()->route('cateories.index');
    }
}