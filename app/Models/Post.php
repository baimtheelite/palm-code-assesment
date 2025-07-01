<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use TomatoPHP\FilamentMediaManager\Models\Media;

class Post extends Model implements HasMedia
{
    use HasUuids, SoftDeletes, InteractsWithMedia, HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $casts = [
        'image' => 'array',
    ];

    protected $with = [
        'images',
    ];

    protected static function booted()
{
    static::deleting(function ($post) {
        if ($post->isForceDeleting()) {
            $post->images()->forceDelete();
            $post->categories()->detach();
        }
    });
}

    public function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class, PostCategory::class);
    }

    public function images() : HasMany {
        return $this->hasMany(Media::class, 'model_id')
                    ->where('model_type', self::class);
    }
}
