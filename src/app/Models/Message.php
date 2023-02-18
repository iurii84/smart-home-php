<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $uuid
 * @property int|null $type
 * @property float $temp
 * @property float $hum
 * @property int $compress_ratio
 * @property string $created
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCompressRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereHum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUuid($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'type',
        'temp',
        'hum',
        'compress_ratio'
    ];

}
