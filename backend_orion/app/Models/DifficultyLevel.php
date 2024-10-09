<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DifficultyLevel extends Model
{
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'level_name',
        'description',
    ];

    /**
     * Relación con el modelo Constellation.
     */
    public function constellations()
    {
        return $this->hasMany(Constellation::class);
    }
}
