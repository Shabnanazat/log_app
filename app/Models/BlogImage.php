<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facedes\Storage;

class BlogImage extends Model
{
    use HasFactory;use HasFactory;

    protected $fillable = [
        'blog_id',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url('users/pictures/'.$this->image);
    }
}
