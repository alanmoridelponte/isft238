<?php
namespace App\View\Components\Public;

use App\Settings\GeneralSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component {
    private string $motto  = '';
    private array $data    = [];
    private array $socials = [];
    private array $menu    = [];

    public function __construct(GeneralSettings $generalSettings) {
        if (! empty($generalSettings->institute_email)) {
            $this->data[] = [
                'name' => $generalSettings->institute_email,
                'href' => "mailto:{$generalSettings->institute_email}",
                'icon' => 'fa-envelope',
            ];
        }
        if (! empty($generalSettings->institute_phone)) {
            $this->data[] = [
                'name' => preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $generalSettings->institute_phone),
                'href' => "tel:{$generalSettings->institute_phone}",
                'icon' => 'fa-phone',
            ];
        }
        if (! empty($generalSettings->institute_address)) {
            $this->data[] = [
                'name' => $generalSettings->institute_address,
                'href' => '',
                'icon' => 'fa-map-marker-alt',
            ];
        }

        if (! empty($generalSettings->institute_whatsapp)) {
            $this->socials[] = [
                'name'  => 'Whatsapp',
                'href'  => $generalSettings->institute_whatsapp,
                'icon'  => 'fa-whatsapp',
                'class' => 'hover:text-green-300',
            ];
        }
        if (! empty($generalSettings->institute_facebook)) {
            $this->socials[] = [
                'name'  => 'Facebook',
                'href'  => $generalSettings->institute_facebook,
                'icon'  => 'fa-facebook-f',
                'class' => 'hover:text-blue-500',
            ];
        }
        if (! empty($generalSettings->institute_instagram)) {
            $this->socials[] = [
                'name'  => 'Instagram',
                'href'  => $generalSettings->institute_instagram,
                'icon'  => 'fa-instagram',
                'class' => 'hover:text-pink-400',
            ];
        }
        if (! empty($generalSettings->institute_youtube)) {
            $this->socials[] = [
                'name'  => 'Youtube',
                'href'  => $generalSettings->institute_youtube,
                'icon'  => 'fa-youtube',
                'class' => 'hover:text-red-500',
            ];
        }

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
        return view('components.public.footer', [
            'data'    => $this->data,
            'socials' => $this->socials,
            'menu'    => $this->menu,
        ]);
    }
}
