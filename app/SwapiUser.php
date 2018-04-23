<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SwapiUser extends Model
{
    protected $fillable = [
        'name',
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'birth_year',
        'gender',
        'homeworld',
        'url',
        'films',
        'species',
        'vehicles',
        'starships',
        'created',
        'edited'
    ];

    public $timestamps = false;
}
