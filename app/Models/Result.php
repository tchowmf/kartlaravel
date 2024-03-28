<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'race_statistics';

    protected $fillable = [
        'kart_id',
        'pilots_id',
        'racetrack_id',
        'best_lap'
    ];

    public $timestamps = true;

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function kart() {
        return $this->belongsTo(Kart::class);
    }
}
