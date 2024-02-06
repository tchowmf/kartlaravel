<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RaceTrack;

class Kart extends Model
{
    use HasFactory;

    protected $table = 'karts';

    protected $fillable = [
        'racetrack_id',
        'identifier'
    ];

    public $timestamps = true;

    public function racetrack()
    {
        return $this->belongsTo(Racetrack::class, 'racetrack_id');
    }
}
