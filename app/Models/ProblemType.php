<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Problem;

class ProblemType extends Model
{
    use HasFactory;
    protected $table = 'problemtype';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
    ];

    public function problems(){
        return $this->hasMany(Problem::class);
    }
}
