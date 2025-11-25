<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $terminal_id
 * @property string $nom
 * @property int $personnel_minimum
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gate> $gates
 * @property-read int|null $gates_count
 * @property-read \App\Models\Terminal|null $terminal
 *
 * @method static \Database\Factories\HallFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hall query()
 *
 * @mixin \Eloquent
 */
class Hall extends Model
{
    use HasFactory;

    protected $fillable = ['terminal_id', 'nom', 'personnel_minimum'];

    protected $casts = [
        'personnel_minimum' => 'integer',
    ];

    /**
     * @return BelongsTo<\App\Models\Terminal, \App\Models\Hall>
     */
    public function terminal(): BelongsTo
    {
        return $this->belongsTo(Terminal::class);
    }

    /**
     * @return HasMany<\App\Models\Gate>
     */
    public function gates(): HasMany
    {
        return $this->hasMany(Gate::class);
    }
}
