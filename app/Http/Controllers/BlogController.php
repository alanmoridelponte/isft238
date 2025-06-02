<?php
namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller {
    public function index(Request $request) {
        $categories = Category::whereHas('posts', function ($query) {
            $query->published();
        })->get();

        $tags = Tag::whereHas('posts', function ($query) {
            $query->published();
        })->get();

        $posts = Post::published()
            ->when(
                $request->input('busqueda'),
                fn($q, $search) => $q->where('title', 'like', "%{$search}%")
            )
            ->latest()
            ->paginate(6);

        return view('blog.index', compact('categories', 'tags', 'posts'));
    }

    public function byTag(Request $request, $slug) {
        $categories = Category::whereHas('posts', function ($query) {
            $query->published();
        })->get();

        $tags = Tag::whereHas('posts', function ($query) {
            $query->published();
        })->get();

        if (! $tags->contains('slug', $slug)) {
            return redirect()->route('blog.index');
        }

        $posts = Post::published()
            ->with('tags')
            ->when(
                $request->input('busqueda'),
                fn($q, $search) => $q->where('title', 'like', "%{$search}%")
            )
            ->latest()
            ->paginate(6);

        return view('blog.index', compact('categories', 'tags', 'posts'));
    }

    public function byCategory(Request $request, $slug) {
        $categories = Category::whereHas('posts', function ($query) {
            $query->published();
        })->get();

        if (! $categories->contains('slug', $slug)) {
            return redirect()->route('blog.index');
        }

        $tags = Tag::whereHas('posts', function ($query) {
            $query->published();
        })->get();

        $posts = Post::published()
            ->with('category')
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->when(
                $request->input('busqueda'),
                fn($q, $search) => $q->where('title', 'like', "%{$search}%")
            )
            ->latest()
            ->paginate(6);

        return view('blog.index', compact('categories', 'tags', 'posts'));
    }

    public function show($category, $post) {
        $post = Post::with('category')
            ->where('slug', $post)
            ->where('status', PostStatus::PUBLISHED)
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })
            ->first();

        if (! $post) {
            return redirect()->route('blog.index');
        }

        return view('blog.show', compact('post'));
    }
}
