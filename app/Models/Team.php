<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'description', 'birthday'];

    public function members()
    {
        return $this->hasMany(Member::class, 'member_id', 'id');
    }
}
