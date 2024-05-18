<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    use HasFactory;
    
    protected $fillable = ['type_id', 'uuid','title','actual_amount','estimated_amount','remark','user_id','date','important'];
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

}
