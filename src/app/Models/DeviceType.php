<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceType extends Model
{
    protected $table = 'device_types';
    protected $fillable = [
        'name',
        'description',
        'screen_type',
        'json'
    ];

    public function devices() {
        return $this->hasMany(Device::class, 'type', 'type_id');
    }
}
