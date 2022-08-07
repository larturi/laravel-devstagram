<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user) 
    {
        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('dashboard', compact('user', 'posts'));
    }

    public function create()  
    {
        return view('posts.create');
    }

    public function store(Request $request)  
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user,  Post $post)
    {
        return view('posts.show', compact('user', 'post'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        // Eliminar la imagen del post
        $imagenPath = public_path('uploads/' . $post->image);

        if(File::exists($imagenPath)) {
            unlink($imagenPath);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
