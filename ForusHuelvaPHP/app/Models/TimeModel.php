<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class TimeModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'date_time';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'sport_id',
        'date_time',
       

    ];
}
