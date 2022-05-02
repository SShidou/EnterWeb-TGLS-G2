<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'deptname',
    ];

    public function post(){
        return $this->hasMany(User::class);
    }
    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($dept) {
            if ($dept->user()->count() > 0) {
                return false;
            }
        });
    }
}