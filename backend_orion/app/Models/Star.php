<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'constellation_id',
        'position_x',
        'position_y',
    ];

    /**
     * Relación con el modelo Constellation.
     */
    public function constellation()
    {
        return $this->belongsTo(Constellation::class);
    }

    // Si tienes un modelo Attempt opcional
    // public function attempts()
    // {
    //     return $this->hasMany(Attempt::class);
    // }
}
