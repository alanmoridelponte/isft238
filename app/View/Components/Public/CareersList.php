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
        $this->careers = Career::orderBy('created_at', 'asc')
            ->where('status', CareerStatus::PUBLISHED->value)
            ->where('deleted_at', null)
            ->when($this->excludeCareer, function ($query) {
                return $query->where('id', '!=', $this->excludeCareer->id);
            })
            ->when($this->randomize, function ($query) {
                return $query->inRandomOrder();
            })
            ->when($this->limit > 0, function ($query) {
                return $query->limit($this->limit);
            })
            ->get();
    }

    public function render(): View | Closure | string {
        return view('components.public.careers-list', ['careers' => $this->careers]);
    }
}
