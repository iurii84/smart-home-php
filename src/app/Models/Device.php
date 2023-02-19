<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uuid',
        'type',
        'location'
    ];

    public function devices() {
        return $this->hasMany(Message::class, 'uuid', 'uuid');
    }
}
