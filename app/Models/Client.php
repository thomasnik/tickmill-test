<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname', 'email', 'avatar'];

    public function getAvatarUrlAttribute()
    {
        return $this->avatar 
            ? asset('storage/app/public/' . $this->avatar) 
            : asset('storage/app/public/default.png'); // Default avatar if not set
    }
}
