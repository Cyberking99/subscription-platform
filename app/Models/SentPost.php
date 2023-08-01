<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentPost extends Model
{
    use HasFactory;
    
    protected $fillable = ['subscriber_id', 'post_id'];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
