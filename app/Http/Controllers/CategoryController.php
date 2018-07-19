<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{

    public function index() {

        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function show($id) {

        // retrieve cat by id

        return view('categories.show', compact('category'));
    }

}
