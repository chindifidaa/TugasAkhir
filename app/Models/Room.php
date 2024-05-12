<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;


class Room extends Model
{
    use HasFactory, HasHashid, HashidRouting;

    protected $appends = ['hashid'];
    protected $guarded = [];
    protected $hidden = ['id'];


    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'facility_rooms');
    }
}
