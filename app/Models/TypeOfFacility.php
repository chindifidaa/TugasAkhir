<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class TypeOfFacility extends Model
{
    use HasFactory, HasHashid, HashidRouting;

    protected $appends = ['hashid'];
    protected $guarded = [];
    protected $hidden = ['id'];

    public function facilities()
    {
        return $this->hasMany(Facility::class, 'type_of_facility_id');
    }
}
