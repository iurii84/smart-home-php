<?php

namespace App\Services\Message;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class MessageService
{
    public function getData($lastMinutes, $afterId): Collection {
        $timeNow = Carbon::now();
        $searchTime = $timeNow->subMinutes($lastMinutes);

        $result = Collection::empty();
        if (isset($lastMinutes)) {
//            get every 3-rd records
//            $result = Message::query()->whereRaw(Message::raw('(`id`) % 3 != 0'))->get();
            $result =  Message::where('created', '>', $searchTime)->get();
        }
        if (isset($afterId)) {
            $result =  Message::where('id', '>', $afterId)->get();
        }

        return $result;
    }
}
