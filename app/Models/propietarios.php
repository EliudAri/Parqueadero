<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propietarios extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','identificacion','cantidadDeVehiculos','placaVehiculo','email','password'];
    protected $hidden = ['password'];
}
