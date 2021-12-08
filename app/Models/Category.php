<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\softDelete;
use Illuminate\Notifications\Notifiable;


class Category extends Model
{
    // use softDeletes;
    use HasFactory;

    //protected $table ='categories';
    protected $fillable =['category_name','status',
    ];
    public function blog(){
        return $this->belogsTo(Blog::class);
    }
}
