<?php

namespace App\Jobs;

use App\Models\DTO\MessageDTO;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public MessageDTO $message_dto;
    public function __construct(MessageDTO $message_dto)
    {
        $this->message_dto = $message_dto;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Message::create((array) $this->message_dto);

        Log::critical(json_encode($this->message_dto));
    }
}
