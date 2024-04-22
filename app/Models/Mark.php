<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Modele;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'mark';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
    ];

    public function modeles(){
        return $this->hasMany(Modele::class);
    }
}
