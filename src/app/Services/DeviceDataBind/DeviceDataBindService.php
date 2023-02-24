<?php

namespace App\Services\DeviceDataBind;

use App\Models\DeviceDataBind;

class DeviceDataBindService
{
    public function get_data_binds(){
        return DeviceDataBind::get();
    }
}
