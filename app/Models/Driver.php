<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'racetrack_id',
        'name'
    ];

    public $timestamps = true;

    public function racetrack()
    {
        return $this->belongsTo(Racetrack::class, 'racetrack_id');
    }
}
