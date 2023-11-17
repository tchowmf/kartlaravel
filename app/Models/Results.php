<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Results extends Model
{
    use HasFactory;

    protected $table = 'voltas';
    protected $fillable = ['nomePiloto', 'melhorVolta', 'notaPiloto'];
    protected $Key = ['numKart'];

    public $timestamps = false;
}
