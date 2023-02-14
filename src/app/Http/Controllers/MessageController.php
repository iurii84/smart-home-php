<?php

namespace App\Http\Controllers;

use App\Events\IngestMessageEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function get() {
        // get every 3-rd records
        $result = Message::query()->whereRaw( Message::raw('(`id`) % 3 != 0'))->get();
        return $result;
    }

    public function post(Request $request) {
        IngestMessageEvent::dispatch($request->all());

    }
}
