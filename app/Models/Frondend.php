<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frondend extends Model
{
    use HasFactory;
    protected $fillable = [
        'tittle', 'description','author','date'
      ];
    public function category()
    {
        return $this->hasOne(Blog::class);
    }
}
