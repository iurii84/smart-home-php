<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceLocation extends Model
{
    protected $table = 'device_locations';
    protected $fillable = [
        'name',
        'description'
    ];

    public function devices() {
        return $this->hasMany(Device::class, 'location', 'location_id');
    }
}
