<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $terminal_id
 * @property string $nom
 * @property int $min_personnel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gate> $gates
 * @property-read int|null $gates_count
 * @property-read \App\Models\Terminal|null $terminal
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall whereMinPersonnel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall whereTerminalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Hall extends Model
{
    protected $fillable = [
        'terminal_id',
        'nom',
        'min_personnel',
    ];

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function gates()
    {
        return $this->hasMany(Gate::class);
    }
}
