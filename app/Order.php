<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number',
        'accepted_at',
        'title',
        'text',
        'contact_name',
        'contact_phone',
        'ati'
    ];

    protected $casts = [
        'accepted_at' => 'datetime',
    ];
}
