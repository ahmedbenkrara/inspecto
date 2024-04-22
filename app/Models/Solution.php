<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Problem;

class Solution extends Model
{
    use HasFactory;
    protected $table = 'solution';
    protected $primarykey = 'id';
    protected $fillable = [
        'description', 'problem_id'
    ];

    public function problem(){
        return $this->belongsTo(Problem::class);
    }
}
