<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'nrc', 'email', 'phone', 'adult', 'child', 'address', 'room', 'status'];

    protected $table = 'guests';

    public function rooms()
    {
        return $this->belongsTo(Room::class,'room');
    }
}
