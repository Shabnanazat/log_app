<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
//use Illuminate\Database\Eloquent\softDeletes;

class Blog extends Model
{
    use HasFactory;
   // use softDeletes;
    
    // protected $guarded = array();
   protected $fillable = [
      'tittle', 'description','status','slug','user_id','category_id','image','is_approved'
    ];
    public function owner()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    
    public function getPhotoAttribute(): string
    {
        if ($this->image) {
            return Storage::disk('public')->url('blogs/blog_images/'.$this->image);
        } else {
            return '';
        }
    }   
    public function blogImages()
    {
        return $this->hasMany(BlogImage::class,'blog_id','id');
    }
        
}
