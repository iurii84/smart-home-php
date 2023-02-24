<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceDataBind extends Model
{
    use HasFactory;

    protected $fillable = [
        'binder_name',
        'device_uuid',
        'device_prop',
        'subscriber_uuid',
        'char_placeholder'
    ];
}
