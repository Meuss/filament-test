<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'fist_name',
        'last_name',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function sessions()
    {
        return $this->hasMany(\App\Models\Session::class);
    }
}
