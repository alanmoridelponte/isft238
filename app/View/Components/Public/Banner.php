<?php
namespace App\View\Components\Public;

use App\Settings\GeneralSettings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banner extends Component {
    public array $leftItems  = [];
    public array $rightItems = [];

    /**
     * Create a new component instance.
     */
    public function __construct(GeneralSettings $generalSettings) {
        if (! empty($generalSettings->institute_email)) {
            $this->leftItems[] = [
                'name' => $generalSettings->institute_email,
                'href' => "mailto:{$generalSettings->institute_email}",
                'icon' => 'fa-envelope',
            ];
        }
        if (! empty($generalSettings->institute_phone)) {
            $this->leftItems[] = [
                'name' => preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $generalSettings->institute_phone),
                'href' => "tel:{$generalSettings->institute_phone}",
                'icon' => 'fa-phone',
            ];
        }

        $this->rightItems[] = [
            'name' => 'Ingreso Docentes',
            'href' => route('filament.admin.pages.dashboard'),
            'icon' => 'fa-sign-in',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string {
        return view('components.public.banner', ['leftItems' => $this->leftItems, 'rightItems' => $this->rightItems]);
    }
}
