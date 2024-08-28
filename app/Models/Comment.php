<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $primaryKey='id';
    protected $fillable = [
        'parent_id',
        'comment',
        'blog_id',
        'user_id'
    ];
    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
