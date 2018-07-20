<?php

namespace App\Http\Controllers;

use Auth;

use App\Category;
use App\Post;
use App\Comment;

class CategoryController extends Controller
{

    public function index() {

        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show($id) {

        // retrieve cat by id
        $post = Category::findOrFail($id);

        return view('categories.show', compact('post', 'category'));
    }

}
