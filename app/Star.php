<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    public function starrable()
    {
        return $this->morphTo();
    }
}
