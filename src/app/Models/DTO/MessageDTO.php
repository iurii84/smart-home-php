<?php

namespace App\Models\DTO;

use DateTime;

class MessageDTO
{
    public int | null $id;
    public string $uuid;
    public int $type;
    public float $temp;
    public float $hum;
    public int | null $compress_ratio;
    public string $created;

    /**
     * @param string $uuid
     * @param int $type
     * @param float $temp
     * @param float $hum
     * @param int|null $compress_ratio
     */
    public function __construct(int | null $id,
                                string $uuid,
                                int $type,
                                float $temp,
                                float $hum,
                                int | null $compress_ratio)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->type = $type;
        $this->temp = $temp;
        $this->hum = $hum;
        $this->compress_ratio = $compress_ratio;
        $this->created = date("Y-m-d H:i:s");
    }
}
