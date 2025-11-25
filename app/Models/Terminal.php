<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property string $nom
 * @property string|null $code
 * @property string|null $emplacement
 * @property \Illuminate\Support\Carbon|null $date_mise_en_service
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gate> $gates
 * @property-read int|null $gates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hall> $halls
 * @property-read int|null $halls_count
 *
 * @method static \Database\Factories\TerminalFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal whereDateMiseEnService($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal whereEmplacement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Terminal whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
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
     * @return HasMany<\App\Models\Hall>
     */
    public function halls(): HasMany
    {
        return $this->hasMany(Hall::class);
    }

    /**
     * @return HasManyThrough<\App\Models\Gate, \App\Models\Hall>
     */
    public function gates(): HasManyThrough
    {
        return $this->hasManyThrough(Gate::class, Hall::class);
    }
}
