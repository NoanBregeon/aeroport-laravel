<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'code',
        'emplacement',
        'date_mise_en_service',
    ];

    protected $casts = [
        'date_mise_en_service' => 'date',
    ];

    /**
     * Un terminal a plusieurs halls.
     */
    public function halls()
    {
        return $this->hasMany(Hall::class);
    }

    /**
     * Un terminal a plusieurs portes via les halls.
     */
    public function gates()
    {
        return $this->hasManyThrough(Gate::class, Hall::class);
    }

    /**
     * Capacité totale des portes ouvertes de ce terminal.
     * Utilisé dans les tests unitaires (attribut dynamique).
     */
    public function getOpenGatesCapacityAttribute(): int
    {
        return $this->gates()
            ->where('ouverte', true)
            ->sum('capacite');
    }
}
