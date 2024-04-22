<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProblemType;
use App\Models\Solution;

class Problem extends Model
{
    use HasFactory;
    protected $table = 'problem';
    protected $primarykey = 'id';
    protected $fillable = [
        'icon', 'name', 'type_id'
    ];

    public function type(){
        return $this->belongsTo(ProblemType::class);
    }

    public function solution(){
        return $this->hasOne(Solution::class);
    }
}
