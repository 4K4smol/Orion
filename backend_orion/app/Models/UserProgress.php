<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'constellation_id',
        'score',
        'attempts',
        'completed_at',
    ];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Constellation.
     */
    public function constellation()
    {
        return $this->belongsTo(Constellation::class);
    }
}
