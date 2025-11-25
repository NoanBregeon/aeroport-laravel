<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $hall_id
 * @property string $nom
 * @property bool $ouverte
 * @property int|null $capacite_max
 * @property int|null $capacite
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hall|null $hall
 *
 * @method static \Database\Factories\GateFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereCapacite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereCapaciteMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereHallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereOuverte($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
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
        'capacite_max' => 'integer',
        'capacite' => 'integer',
    ];

    /**
     * @return BelongsTo<\App\Models\Hall, \App\Models\Gate>
     */
    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }
}
