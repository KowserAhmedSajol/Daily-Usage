<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['uuid','category_id','sub_category_id','title','slug','serial','image','description','created_by'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function tags()
    {
        return $this->hasMany(BlogTag::class, 'blog_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }

}
