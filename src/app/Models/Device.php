<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uuid',
        'type',
        'location',
        'first_occurrence'
    ];

    public function messages() {
        return $this->hasMany(Message::class, 'uuid', 'uuid');
    }

    public function type() {
        return $this->hasOne(DeviceType::class, 'type_id', 'type');
    }

    public function location() {
        return $this->hasOne(DeviceLocation::class, 'location_id', 'location');
    }
}
