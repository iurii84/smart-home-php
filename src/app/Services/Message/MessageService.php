<?php

namespace App\Services\Message;

use App\Models\Message;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class MessageService
{
    public function getData($lastMinutes, $afterId): Collection {
        $timeNow = Carbon::now();
        $searchTime = $timeNow->subMinutes($lastMinutes);

        $result = Collection::empty();
        if (isset($lastMinutes) and !isset($afterId)) {
            $query = Message::where('created', '>', $searchTime);
            //$result =  Message::where('created', '>', $searchTime)->whereRaw('`id` % 10 = 0')->get();
            $trimmedQuery = $this->trimReturnedMessages($query);
            $result = $trimmedQuery->get();
        } else
        {
            if (isset($afterId)) {
                $query =  Message::where('id', '>', $afterId);
                $trimmedQuery = $this->trimReturnedMessages($query);
                $result = $trimmedQuery->get();
            }
        }
        return $result;
    }

    private function trimReturnedMessages($query) {
        $MESSAGES_LIMIT = 700;
        $countElements = $query->count('*');

        if ($countElements>$MESSAGES_LIMIT) {
            $divider = round($countElements / $MESSAGES_LIMIT);
            Debugbar::info($countElements);
            return $query->whereRaw("`id` % $divider = 0");
        } else {
            return $query;
        }
    }
}
