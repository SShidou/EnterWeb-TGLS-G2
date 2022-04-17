<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;

class Post extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'category_id',
        'author',
        'content',
        #'image',
        'file'
    ];
    /**
     * @var mixed
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likeBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }
    public function dislikeBy(User $user)
    {
        return $this->dislikes->contains('user_id', $user->id);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
