<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = ['team_primary_color', 'team_id'];

    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
