<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'therapist_id',
        'room_id',
        'start_at',
        'end_at',
    ];

    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class);
    }

    public function therapist()
    {
        return $this->belongsTo(\App\Models\Therapist::class);
    }
}
