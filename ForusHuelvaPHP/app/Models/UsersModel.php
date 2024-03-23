<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class UsersModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',

    ];

}
