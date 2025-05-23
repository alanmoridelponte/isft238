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
                'url'    => route('home'),
                'active' => request()->routeIs('home'),
            ],
            [
                'name'   => 'Institucional',
                'url'    => route('institutional'),
                'active' => request()->routeIs('institutional'),
            ],
            [
                'name'   => 'Contacto',
                'url'    => route('contact'),
                'active' => request()->routeIs('contact'),
            ],
            [
                'name'   => 'Carreras',
                'url'    => route('careers'),
                'active' => request()->routeIs('careers'),
            ],
            [
                'name'   => 'Noticias',
                'url'    => route('blog'),
                'active' => request()->routeIs('blog'),
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
