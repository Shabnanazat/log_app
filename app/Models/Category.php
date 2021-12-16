<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model

{
    use HasFactory;
    protected $fillable = ['category_name','status','icon'
    ];
  // protected $appends = ['icon_url'];
    public function getIconUrlAttribute()

    {
        return Storage::disk('public')->url('admin/category/'.$this->icon);
    }

}