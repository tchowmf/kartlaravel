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
        'name',
        'grade',
    ];

    public $timestamps = true;

    public function racetrack()
    {
        return $this->belongsTo(Racetrack::class, 'racetrack_id');
    }

    public function formattedBestLap()
    {
        // Obtendo a melhor volta média com base nos resultados associados a este kart
        $BestLap = Result::where('driver_id', $this->id)->min('best_lap');

        // Se não houver resultados, retorna 'N/A'
        if ($BestLap === null) {
            return 'N/A';
        }

        // Convertendo para minutos, segundos e milissegundos
        $minutes = floor($BestLap / 60);
        $seconds = floor($BestLap % 60);
        $milliseconds = round(($BestLap - floor($BestLap)) * 1000);

        // Formatando a string de tempo
        return sprintf('%02d:%02d:%03d', $minutes, $seconds, $milliseconds);
    }
}
