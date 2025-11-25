<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'terminal_id',
        'nom',
        'personnel_minimum',
    ];

    /**
     * Un hall appartient à un terminal.
     */
    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    /**
     * Un hall a plusieurs portes.
     */
    public function gates()
    {
        return $this->hasMany(Gate::class);
    }
}
