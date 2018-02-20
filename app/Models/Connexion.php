<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connexion extends Model
{
     protected $table = 'connexions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['datetime', 'city', 'country', 'ip'];
}
