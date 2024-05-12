<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtvs\EloquentHashids\HasHashid;
use Mtvs\EloquentHashids\HashidRouting;

class Service extends Model
{
    use HasFactory, HasHashid, HashidRouting;

    protected $appends = ['hashid'];
    protected $guarded = [];
    protected $hidden = ['id'];
}
