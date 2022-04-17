<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/egBN0wuawLUAzV1g2kcSvZFfK4oQtzwtKpRvoASH.png';

        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this-> belongsTo(User::class);
    }
}
