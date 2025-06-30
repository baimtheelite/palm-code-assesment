<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasUuids, SoftDeletes;
    protected $keyType = 'string';
    public $incrementing = false;

    public function posts() : BelongsToMany {
        return $this->belongsToMany(Post::class, PostCategory::class);
    }
}
