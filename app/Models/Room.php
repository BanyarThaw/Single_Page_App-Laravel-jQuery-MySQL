<?php

namespace App\Models;

use App\Models\RoomType;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    public function room_types()
    {
        return $this->belongsTo(RoomType::class,'room_type');
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
