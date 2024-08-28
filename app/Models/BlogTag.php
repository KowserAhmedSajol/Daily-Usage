<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;
    protected $table  = "blog_tag";
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function blog()
    {
        return $this->belongsTo(Blof::class);
    }

}
