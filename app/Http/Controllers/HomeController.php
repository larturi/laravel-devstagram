<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user()) {
            // Personas a las que sigue el usuario
            $idsFollowings = auth()->user()->following->pluck('id')->toArray();

            // Posts de las personas a las que sigue el usuario
            $posts = Post::whereIn('user_id', $idsFollowings)->paginate(20);
        } else {
            $posts = [];
        }

        return view('home', compact('posts'));
    }
}
