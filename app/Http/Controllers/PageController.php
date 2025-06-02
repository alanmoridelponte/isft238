<?php
namespace App\Http\Controllers;

use App\Models\Post;

class PageController extends Controller {
    public function index() {
        $posts = Post::published()
            ->latest()
            ->paginate(3);

        return view('page.index', compact('posts'));
    }

    public function contact() {
        return view('page.contact');
    }

    public function institutional() {
        return view('page.institutional');
    }
}
