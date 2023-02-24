<?php

namespace App\Services\Device;

use App\Models\Device;
use App\Models\DTO\DeviceDTO;
use App\Models\Message;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DeviceService
{
    public function get_unregistered(): Collection
    {
        //        SELECT distinct uuid, min(created) as first_occurence, "type" FROM public.message
//        where uuid  not in (Select  uuid from public.device)
//        group by uuid, type
        return DB::table('homestead.messages')
            ->join('homestead.device_types', 'type', '=', 'type_id', 'left')
            ->select('uuid', DB::raw("min(created) as first_occurrence"), 'type', 'homestead.device_types.name as "type_name"')
            ->whereNotIn('uuid',(function ($query) {
                $query->from('homestead.devices')
                    ->select('uuid');
            }))
                ->groupBy('uuid','type','homestead.device_types.name')
                ->get();
    }

    public function get($is_display)
    {
        if ($is_display) {
            return Device::whereHas('type', function ($query) {
                $query->whereNotNull('screen_type');
            })->get();
        }
        else {
            return Device::get();
        }
    }



    public function register(DeviceDTO $deviceDTO)
    {
        $message = Message::where('uuid', '=', $deviceDTO->uuid)->orderBy('created')->first();
        $type = $message->type;
        $first_occurrence = $message->created;
        $deviceDTO->type = $type;
        $deviceDTO->first_occurrence = $first_occurrence;
        return Device::create((array) $deviceDTO);
    }

    public function delete(int $device_id)
    {
        return Device::destroy($device_id);
    }

    public function update(DeviceDTO $device, int $device_id)
    {
        $device_db = Device::find($device_id);
        $device_db->name = $device->name;
        $device_db->location = $device->location;

        return $device_db->save();
    }
}
