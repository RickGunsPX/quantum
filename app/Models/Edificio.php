<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];

    public function pisos()
    {
        return $this->hasMany(Salon::class, 'idEdificio');
    }
}
