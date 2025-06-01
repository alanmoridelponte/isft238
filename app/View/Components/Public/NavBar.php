<?php
namespace App\View\Components\Public;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavBar extends Component {
    private array $menu = [];

    /**
     * Create a new component instance.
     */
    public function __construct() {
        $this->menu = [
            [
                'name'   => 'Inicio',
                'url'    => route('page.index'),
                'active' => request()->routeIs('page.index'),
            ],
            [
                'name'   => 'Institucional',
                'url'    => route('page.institutional'),
                'active' => request()->routeIs('page.institutional'),
            ],
            [
                'name'   => 'Contacto',
                'url'    => route('page.contact'),
                'active' => request()->routeIs('page.contact'),
            ],
            [
                'name'   => 'Carreras',
                'url'    => route('careers.index'),
                'active' => request()->routeIs('careers.index'),
            ],
            [
                'name'   => 'Noticias',
                'url'    => route('blog.index'),
                'active' => request()->routeIs('blog.index'),
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string {
        return view('components.public.nav-bar', ['menu' => $this->menu]);
    }
}
