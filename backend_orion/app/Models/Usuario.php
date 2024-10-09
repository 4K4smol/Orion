<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Si usas Laravel Sanctum o Passport para autenticación de API
// use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use Notifiable;
    // Si usas Laravel Sanctum o Passport
    // use HasApiTokens;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben ocultarse para arreglos.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con el modelo UserProgress.
     */
    public function progress()
    {
        return $this->hasMany(UserProgress::class);
    }

    // Si tienes un modelo Setting (Configuración) opcional
    // public function settings()
    // {
    //     return $this->hasMany(Setting::class);
    // }
}
