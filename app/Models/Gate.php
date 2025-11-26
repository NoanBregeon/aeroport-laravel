<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $hall_id
 * @property string $numero
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hall|null $hall
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereHallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Gate whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Gate extends Model
{
    protected $fillable = [
        'hall_id',
        'nom',
        'is_open',
        'capacite_max',
    ];

    protected $casts = [
        'is_open' => 'boolean',
    ];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}
