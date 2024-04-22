<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Modele;

class Motorisation extends Model
{
    use HasFactory;
    protected $table = 'motorisation';
    protected $primarykey = 'id';
    protected $fillable = [
        'name', 'type', 'modele_id'
    ];

    public function modele(){
        return $this->belongsTo(Modele::class);
    }
}
