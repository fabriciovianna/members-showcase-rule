<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'event_date', 'member_id'];

    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'member_id');
    }
}
