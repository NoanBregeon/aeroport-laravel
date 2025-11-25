<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'nom',
        'ouverte',
        'capacite_max',
        'capacite',
    ];

    protected $casts = [
        'ouverte' => 'boolean',
    ];

    /**
     * Une porte appartient à un hall.
     */
    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
