<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'phone', 'date', 'brandmodel_id', 'carmodel_id', 'service_id', 'station_id'];

    public function brandModel()
    {
        return $this->belongsTo(brandmodels::class,'brandmodel_id');
    }

    public function carModel()
    {
        return $this->belongsTo(carmodels::class,'carmodel_id');
    }

    public function service()
    {
        return $this->belongsTo(services::class,'service_id');
    }

    public function station()
    {
        return $this->belongsTo(station::class,'station_id');
    }
}
