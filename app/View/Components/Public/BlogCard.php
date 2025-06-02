<?php
namespace App\View\Components\Public;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogCard extends Component {
    public function __construct(public Post $post) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View | Closure | string {
        return view('components.public.blog-card', ['post' => $this->post]);
    }
}
