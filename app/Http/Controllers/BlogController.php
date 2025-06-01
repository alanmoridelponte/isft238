<?php
namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller {
    static array $options = [
        'only' => [
            'index',
            'show',
        ],
    ];

    public function index() {
        return view('blog.index', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function show(Post $post) {
        return view('blog.index', compact('post'));
    }
}
