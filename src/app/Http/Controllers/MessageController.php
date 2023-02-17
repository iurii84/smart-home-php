<?php

namespace App\Http\Controllers;

use App\Events\IngestMessageEvent;
use App\Models\DTO\MessageDTO;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function get()
    {
        // get every 3-rd records
        $result = Message::query()->whereRaw(Message::raw('(`id`) % 3 != 0'))->get();
        return $result;
    }

    public function post(Request $request)
    {
        $uuid = $request->input('uuid');
        $type = $request->input('type');
        $temp = $request->input('temp');
        $hum = $request->input('hum');
        $compress_ratio = $request->input('compress_ratio');

        $message_dto = new MessageDTO(
            id: null,
            uuid: $uuid,
            type: $type,
            temp: $temp,
            hum: $hum,
            compress_ratio: 0);
        IngestMessageEvent::dispatch($message_dto);

    }
}
