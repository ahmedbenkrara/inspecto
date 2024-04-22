<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Modele;
use App\Models\Motorisation;
use App\Models\Generation;
use App\Models\PriceRange;


class Car extends Model
{
    use HasFactory;
    protected $table = 'car';
    protected $primarykey = 'id';
    protected $fillable = [
        'image', 'motorisation_id', 'generation_id'
    ];

    public function priceranges(){
        return $this->belongsToMany(PriceRange::class, 'car_price', 'pricerange_id', 'car_id');
    }

    public function motorisation(){
        return $this->belongsTo(Motorisation::class);
    }

    public function generation(){
        return $this->belongsTo(Generation::class);
    }
}
