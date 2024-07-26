<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['uuid','category_id','name','slug','serial','image'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'sub_category_id', 'id');
    }
}
