<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = ['income_type_id', 'uuid','title','amount','remark','user_id','date'];
    public function income_type()
    {
        return $this->belongsTo(IncomeType::class, 'income_type_id');
    }
}
