<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Personas a las que sigue el usuario
        $idsFollowings = auth()->user()->following->pluck('id')->toArray();

        // Posts de las personas a las que sigue el usuario
        $posts = Post::whereIn('user_id', $idsFollowings)->paginate(20);

        return view('home', compact('posts'));
    }
}
