<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // One-to-many relationship with the Subscriber model
    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    // One-to-many relationship with the Post model
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
