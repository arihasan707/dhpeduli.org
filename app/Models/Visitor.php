<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'url',
        'utm_source',
        'utm_campaign',
        'visited_at',
    ];

    public $timestamps = false;
}
