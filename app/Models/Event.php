<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded=[];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i', 
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function eventFor()
    {
        return $this->belongsTo(User::class, 'event_for_id');
    }

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function requisitionItems()
    {
        return $this->hasMany(RequisitionItem::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function isExpired()
    {
        return $this->date->isPast(); 
    }
}
