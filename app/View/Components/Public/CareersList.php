<?php
namespace App\View\Components\Public;

use App\Enums\CareerStatus;
use App\Models\Career;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CareersList extends Component {

    public function __construct(
        private Collection $careers
    ) {
        $this->careers = Career::orderBy('created_at', 'desc')
            ->where('status', CareerStatus::PUBLISHED->value)
            ->where('deleted_at', null)
            ->get();
    }

    public function render(): View | Closure | string {
        return view('components.public.careers-list', ['careers' => $this->careers]);
    }
}
