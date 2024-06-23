<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carmodels extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'brandmodel_id'];

    public function brandModel()
    {
        return $this->belongsTo(brandmodels::class);
    }
}
