<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function stars()
    {
        return $this->morphMany(Star::class, 'starrable');
    }
}
