<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['date_for_web', 'image_for_web'];

    public function getDateForWebAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function getImageForWebAttribute(): string
    {
        return asset('/uploads/posts_images/').'/'.$this->image;
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public static function scopeSearch($query,$search)
    {
        $query->Where('id', 'like', '%'.$search.'%')
            ->orWhere('title', 'like', '%'.$search.'%')
            ->orWhere('content', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->orWhereHas('author', function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
            });
    }
}
