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
        'identifier',
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
        $avgBestLap = Result::where('kart_id', $this->id)->avg('best_lap');

        // Se não houver resultados, retorna 'N/A'
        if ($avgBestLap === null) {
            return 'N/A';
        }

        // Convertendo para minutos, segundos e milissegundos
        $minutes = floor($avgBestLap / 60);
        $seconds = floor($avgBestLap % 60);
        $milliseconds = round(($avgBestLap - floor($avgBestLap)) * 1000);

        // Formatando a string de tempo
        return sprintf('%02d:%02d:%03d', $minutes, $seconds, $milliseconds);
    }
}
