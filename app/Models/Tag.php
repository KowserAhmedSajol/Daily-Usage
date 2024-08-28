<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['uuid','title','is_active','created_by'];
    public function blogTag() {
        return $this->hasMany(BlogTag::class, 'tag_id');
    }
    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
