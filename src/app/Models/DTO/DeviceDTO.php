<?php

namespace App\Models\DTO;

class DeviceDTO
{
    public int | null $id;
    public string | null $uuid;
    public string $name;
    public int | null $type;
    public int $location;
    public string $first_occurrence;

    /**
     * @param int|null $id
     * @param string|null $uuid
     * @param string $name
     * @param int|null $type
     * @param int $location
     */
    public function __construct(int | null $id,
                                string | null $uuid,
                                string $name,
                                int | null $type,
                                int $location)
    {
        $this->id = $id;
        $this->uuid = $uuid;
        $this->name = $name;
        $this->type = $type;
        $this->location = $location;
    }
}
