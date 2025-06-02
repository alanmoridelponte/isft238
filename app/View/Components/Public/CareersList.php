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
        private Collection $careers,
        public Career $excludeCareer,
        public bool $randomize = false,
        public int $limit = 0,
    ) {
        if ($this->excludeCareer && $this->randomize && $this->limit > 0) {
            $this->careers = Career::inRandomOrder()
                ->take($this->limit)
                ->where('id', '!=', $this->excludeCareer->id)
                ->where('status', CareerStatus::PUBLISHED->value)
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            $this->careers = Career::orderBy('created_at', 'asc')
                ->where('status', CareerStatus::PUBLISHED->value)
                ->get();
        }
    }

    public function render(): View | Closure | string {
        return view('components.public.careers-list', ['careers' => $this->careers]);
    }
}
