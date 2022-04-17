<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'catename',
        'closure_date'
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            if ($category->post()->count() > 0) {
                return false;
            }
        });
    }
}
