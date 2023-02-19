<?php

namespace App\Http\Controllers;


use App\Services\Device\DeviceService;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function get_unregistered(DeviceService $deviceService)
    {
        return $deviceService->get_unregistered();
    }
}
