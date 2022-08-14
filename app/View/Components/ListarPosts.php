<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListarPosts extends Component
{
    public $posts;

    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function render()
    {
        return view('components.listar-posts');
    }
}
