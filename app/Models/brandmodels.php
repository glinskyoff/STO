<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brandmodels extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function carModels()
    {
        return $this->hasMany(carmodels::class);
    }
}
