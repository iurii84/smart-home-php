<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
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
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereCompressRatio($value)
 * @method static Builder|Message whereCreated($value)
 * @method static Builder|Message whereHum($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereTemp($value)
 * @method static Builder|Message whereType($value)
 * @method static Builder|Message whereUuid($value)
 * @mixin Eloquent
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
