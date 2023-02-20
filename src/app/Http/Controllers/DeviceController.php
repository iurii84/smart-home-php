<?php

namespace App\Http\Controllers;


use App\Models\DTO\DeviceDTO;
use App\Services\Device\DeviceLocationService;
use App\Services\Device\DeviceService;

use App\Services\Device\DeviceTypeService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function get(Request $request, DeviceService $deviceService)
    {
        $is_display = $request->get('is_display');
        return $deviceService->get(is_display: $is_display);
    }
    public function register(Request $request, DeviceService $deviceService)
    {
        $uuid = $request->get('uuid');
        $name = $request->get('name');
        $location = $request->get('location');

        $device = new DeviceDTO(id: null, uuid: $uuid, name: $name, type: null, location: $location);

        return $deviceService->register($device);
    }
    public function get_unregistered(DeviceService $deviceService)
    {
        return $deviceService->get_unregistered();
    }

    public function get_locations(DeviceLocationService $deviceLocationService): Collection
    {
        return $deviceLocationService->get_locations();
    }

    public function get_types(DeviceTypeService $deviceTypeService): Collection
    {
        return $deviceTypeService->get_types();
    }

    public function delete(DeviceService $deviceService, int $device_id)
    {
        return $deviceService->delete($device_id);
    }

    public function update(Request $request, DeviceService $deviceService, int $device_id)
    {
        $name = $request->get('name');
        $location = $request->get('location');
        $device = new DeviceDTO(id: null, uuid: null, name: $name, type: null, location: $location);

        return $deviceService->update($device, $device_id);
    }
}
