<?php
namespace App\Models;

use App\Enums\CareerStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'duration',
        'modality',
        'scope',
        'body',
        'status',
    ];

    protected $casts = [
        'status' => CareerStatus::class,
    ];
}
