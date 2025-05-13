<?php
namespace App\View\Components\Public;

use App\Models\Career;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CareersListCard extends Component {

    public function __construct(
        public Career $career
    ) {
    }

    public function render(): View | Closure | string {
        return view('components.public.careers-list-card');
    }
}
