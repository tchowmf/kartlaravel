<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karts extends Model
{
    use HasFactory;

    protected $table = "kart";
    protected $fillable = ["mediaTempo", "numVotlas"];
    protected $uniqueKey = ["numKart"];

    public $timestamps = false;
}
