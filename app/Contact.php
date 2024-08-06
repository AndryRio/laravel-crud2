<?php

namespace App;

use Faker\Provider\PhoneNumber;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    /*public function contacts()
    {
        return $this->belongsToMany(User::class);
    }*/

    protected $fillable = [
        'name',
        'number',
    ];

    //protected $primaryKey = 'number';

    //protected $keyType = 'string';

    protected $attributes = [
        'admin' => false,
    ];

    public function stars()
    {
        return $this->morphMany(Star::class, ' starrable');
    }

}
