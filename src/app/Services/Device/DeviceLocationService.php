<?php

namespace App\Services\Device;



use App\Models\DeviceLocation;

class DeviceLocationService
{
    public function get_locations() {
        return DeviceLocation::all();
    }
}
