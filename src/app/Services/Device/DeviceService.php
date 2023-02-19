<?php

namespace App\Services\Device;

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
            ->select('uuid', DB::raw("min(created) as first_occurence"), 'type')
            ->whereNotIn('uuid',(function ($query) {
                $query->from('homestead.devices')
                    ->select('uuid');
            }))
                ->groupBy('uuid','type')
                ->get();
    }
}
