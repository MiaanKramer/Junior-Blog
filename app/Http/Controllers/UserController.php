<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index($key) {

        $user = Auth::user();

        $users = User::all();

        return view('user.user-index', compact('user', 'users'));

    }
    public function show() {

        $user = Auth::user();

        return view('user.account-overview', compact('user'));

    }

    public function edit() {

        $user = Auth::user();
        return view('user.account-overview', compact('user'));

    }

    public function update() {

        $user = Auth::user();

        return back();

    }

    public function store() {

        $user = Auth::user();
        return view('user.account-overview', compact('user'));

    }

    public function delete() {

        $user = Auth::user();
        return view('user.account-overview', compact('user'));

    }


}
