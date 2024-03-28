<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceTrack extends Model
{
    use HasFactory;

    protected $table = 'racetracks';

    protected $fillable = [
        'name'
    ];

    public $timestamps = true;

    public function karts()
    {
        return $this->hasMany(Kart::class, 'racetrack_id');
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class, 'racetrack_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'racetrack_id');
    }
}
