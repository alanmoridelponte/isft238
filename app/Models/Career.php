<?php
namespace App\Models;

use App\Enums\CareerStatus;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'resolution',
        'excerpt',
        'duration',
        'modality',
        'scope',
        'study_plan',
        'status',
    ];

    protected $casts = [
        'status'     => CareerStatus::class,
        'study_plan' => 'array',
    ];

    protected $routeKeyName;

    public function getRouteKeyName() {
        if (Filament::isServing()) {
            return 'id';
        }

        return 'slug';
    }
}
