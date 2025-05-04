<?php
namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'created_by',
        'category_id',
        'status',
        'title',
        'slug',
        'excerpt',
        'banner',
        'banner_video_url',
        'body',
    ];

    protected $casts = [
        'status' => PostStatus::class,
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
