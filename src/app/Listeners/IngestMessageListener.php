<?php

namespace App\Listeners;

use App\Events\IngestMessageEvent;
use App\Jobs\ProcessMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class IngestMessageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param IngestMessageEvent $event
     * @return void
     */
    public function handle(IngestMessageEvent $event)
    {
        ProcessMessage::dispatch($event->message_dto);
    }
}
