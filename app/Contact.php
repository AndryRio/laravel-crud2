<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'name',
        'number',
    ];

    //protected $primaryKey = 'number';

    //protected $keyType = 'string';

    protected $attributes = [
        'admin' => false,
    ];

}
