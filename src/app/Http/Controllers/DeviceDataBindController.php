<?php

namespace App\Http\Controllers;

use App\Services\DeviceDataBind\DeviceDataBindService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DeviceDataBindController extends Controller
{
    public function get(DeviceDataBindService $dataBindService )
    {
        return $dataBindService->get_data_binds();
    }
}
