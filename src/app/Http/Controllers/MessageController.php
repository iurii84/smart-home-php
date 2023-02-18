<?php

namespace App\Http\Controllers;

use App\Events\IngestMessageEvent;
use App\Models\DTO\MessageDTO;
use App\Services\Message\MessageService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function get(Request $request, MessageService $messageService): Collection
    {

        $lastMinutes = $request->get('lastMinutes');
        $afterId = $request->get('after_id');

        return $messageService->getData(lastMinutes: $lastMinutes, afterId: $afterId);
    }

    public function post(Request $request)
    {
        $uuid = $request->input('uuid');
        $type = $request->input('type');
        $temp = $request->input('temp');
        $hum = $request->input('hum');

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
