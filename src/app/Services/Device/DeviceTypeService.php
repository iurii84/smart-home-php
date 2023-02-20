<?php

namespace App\Services\Device;



use App\Models\DeviceType;

class DeviceTypeService
{
    public function get_types(){
        return DeviceType::all();
    }
}
