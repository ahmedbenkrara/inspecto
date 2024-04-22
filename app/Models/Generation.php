<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Modele;

class Generation extends Model
{
    use HasFactory;
    protected $table = 'generation';
    protected $primarykey = 'id';
    protected $fillable = [
        'name', 'modele_id'
    ];

    public function modele(){
        return $this->belongsTo(Modele::class);
    }
}
