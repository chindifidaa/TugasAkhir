<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Facility extends Model
{
    use HasFactory, HasHashid, HashidRouting;

    protected $appends = ['hashid'];
    protected $guarded = [];

    protected $hidden = ['id'];

    public function typeOfFacility()
    {
        return $this->belongsTo(TypeOfFacility::class, 'type_of_facility_id');
    }

    public function room()
    {
        return $this->belongsToMany(Room::class, 'facility_rooms');
    }
}
