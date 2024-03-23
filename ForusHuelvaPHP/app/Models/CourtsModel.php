<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class CourtsModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'courts';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'sport',
       

    ];
}
