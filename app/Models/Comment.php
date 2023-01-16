<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $appends = ['date_for_web'];

    public function getDateForWebAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public static function scopeSearch($query,$search)
    {
        $query->Where('id', 'like', '%'.$search.'%')
            ->orWhere('comment', 'like', '%'.$search.'%')
            ->orWhere('created_at', 'like', '%'.$search.'%')
            ->orWhereHas('post', function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->orWhereHas('user', function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%');
            });
    }
}
