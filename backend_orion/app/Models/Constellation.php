<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constellation extends Model
{
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'difficulty_level_id',
    ];

    /**
     * Relación con el modelo DifficultyLevel.
     */
    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultyLevel::class);
    }

    /**
     * Relación con el modelo Star.
     */
    public function stars()
    {
        return $this->hasMany(Star::class);
    }

    /**
     * Relación con el modelo UserProgress.
     */
    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }

    // Si tienes un modelo Attempt opcional
    // public function attempts()
    // {
    //     return $this->hasMany(Attempt::class);
    // }
}
