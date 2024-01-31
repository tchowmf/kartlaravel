<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    use HasFactory;

    protected $table = 'pilots';

    protected $fillable = [
        'racetrack_id',
        'name'
    ];

    public $timestamps = true;
}
